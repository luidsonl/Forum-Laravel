<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Support\StoreSupportRequest;
use App\Http\Requests\Support\UpdateSupportRequest;
use App\Models\Reply;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public $statusIcon = array(
        'active' => '<i class="bi bi-exclamation-circle-fill text-success" title="Ativo"></i>',
        'pending' => '<i class="bi bi-hourglass-split text-warning" title="Pendente"></i>',
        'completed' => '<i class="bi bi-check2-square text-success" title="Solucionado"></i>',
        'archived' => '<i class="bi bi-archive-fill text-secondary" title="Arquivado"></i>'
    );

    public function index(Support $support){

        $supports = $support->orderBy('updated_at', 'desc')->paginate(10);

        return view('supports/index', [
            'supports'=>$supports,
            'statusIcon'=>$this->statusIcon
        ]);
    }
    public function my(Support $support){

        $supports = $support->where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);

        return view('supports/my', [
            'supports'=>$supports,
            'statusIcon'=>$this->statusIcon
        ]);
    }

    public function show(string|int $id, Support $support, Reply $reply){
        if(!$support = $support->find($id)){
            return redirect()->back();
        }
        //return view('admin/supports/show', compact('support'));

        $replies = $reply->where('support_id', $support->id)->orderBy('updated_at', 'desc')->get();

        return view('supports/show', [
            'support'=>$support,
            'statusIcon'=>$this->statusIcon,
            'replies'=> $replies
        ]);
    }

    public function create(){
        return view('supports/create');
    }

    public function store(Support $support, StoreSupportRequest $request){

        $data = $request->all();
        $data['status'] = 'active';
        $data['user_id'] = strval(Auth::user()->id);

        
        $support->create($data);
        
        return redirect()->route('supports.my');
    }

    public function edit(string|int $id, Support $support){
        if(!$support = $support->where('id', $id)->first()){
            return redirect()->back();
        }
        if(Auth::user()->id != $support->user_id){
            return redirect()->back();
        }
        return view('supports/edit', compact('support'));
    }

    public function update(string|int $id, Support $support, UpdateSupportRequest $request){
        if(!$support = $support->where('id', $id)->first()){
            return redirect()->back();
        }
        if(Auth::user()->id != $support->user_id){
            return redirect()->back();
        }
        $support->update($request->only([
            'subject',
            'body',
            'status',
        ]));
        return redirect()->route('supports.show', $id);
    }

    public function destroy(string|int $id, Support $support){
        if(!$support = $support->find($id)){
            return redirect()->back();
        }
        if(Auth::user()->id != $support->user_id){
            return redirect()->back();
        }
        $support->delete();

        return redirect()->route('supports.my');
    }
}
