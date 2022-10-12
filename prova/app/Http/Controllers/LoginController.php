<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request) {

        $erro = $request->get('erro') == 1 ? 'Usuario ou senha não existe' : '';
        if ($erro == '') $erro = $request->get('erro') == 2 ? 'Login não foi feito' : '';

        return view('site.login', ['erro' => $erro]);

    }

    public function autenticar(Request $request) {

        $regras = [
            'login' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'login.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('login');
        $password = $request->get('senha');
        
        $user = new User();
        $usuario = $user->where('email',$email)
                       ->where('password',$password)
                       ->get()
                       ->first();
                       
        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('site.home');
        } else {
            return redirect()->route('site.login', ['erro'=>1]);
        }

    }
}
