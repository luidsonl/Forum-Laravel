<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reply\StoreReplyRequest;
use App\Http\Requests\Reply\UpdateReplyRequest;
use App\Models\Reply;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function create(string|int $supportId, Support $support){
        if(!$support = $support->where('id', $supportId)->first()){
            return redirect()->back();
        }
        //dd($supportId, $support);
        return view('replies/create', [
            'support'=>$support
        ]);
    }

    public function store(Reply $reply, StoreReplyRequest $request){
        $data = $request->all();
        $data['user_id'] = strval(Auth::user()->id);


        $reply->create($data);
        return redirect()->route('supports.show', $data['support_id']);
    }

    public function destroy(string|int $id, Reply $reply){
        if(!$reply = $reply->find($id)){
            return redirect()->back();
        }
        if(Auth::user()->id != $reply->user_id){
            return redirect()->back();
        }
        $reply->delete();

        return redirect()->route('supports.show', $reply['support_id']);
    }

    public function edit(string|int $id, Reply $reply){
        if(!$reply = $reply->where('id', $id)->first()){
            return redirect()->back();
        }
        if(Auth::user()->id != $reply->user_id){
            return redirect()->back();
        }
        //dd($reply);
        return view('replies/edit', [
            'reply'=>$reply,
        ]);
    }

    public function update(string|int $id, Reply $reply, UpdateReplyRequest $request){
        if(!$reply = $reply->where('id', $id)->first()){
            return redirect()->back();
        }
        if(Auth::user()->id != $reply->user_id){
            return redirect()->back();
        }
        $reply->update($request->only([
            'body',
        ]));
        return redirect()->route('supports.show', $reply->support_id);
    }
}
