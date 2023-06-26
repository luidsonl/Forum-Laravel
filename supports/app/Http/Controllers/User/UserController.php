<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    //Métodos que apenas redirecionam
    public function login(){
        return view('user/login');
    }

    public function signup(){
        return view('user/signup');
    }

    public function profile(){
        return view('user/profile');
    }


    // Métodos que acessam o bd
    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/supports');
        }
 
        return redirect()->route('user.login')->withErrors([
            'Email ou senha incorretos',
        ])->withInput($request->only('email'));
    }

    public function store(CreateUserRequest $request)
    {
        // Validação dos dados é realizada automaticamente antes de chegarmos aqui
    
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
    
        // Outras ações, como redirecionamento ou resposta JSON, podem ser adicionadas aqui
    
        return redirect()->route('user.login');
    }
    
    //Outros métodos
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
