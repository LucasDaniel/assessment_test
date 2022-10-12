<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request) {

        $erro = $request->get('erro') == 1 ? 'Usuario ou senha não existe' : '';

        return view('site.login', ['erro' => $erro]);

    }

    public function autenticar(Request $request) {

        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');
        
        $user = new User();
        $usuario = $user->where('email',$email)
                       ->where('password',$password)
                       ->get()
                       ->first();

        if (isset($usuario->name)) {
            
        } else {
            return redirect()->route('site.login', ['erro'=>1]);
        }

    }
}
