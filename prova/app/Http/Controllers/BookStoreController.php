<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookStore;

class BookStoreController extends Controller
{
    public function add(Request $request) {

        $msg = "";

        if ($request->input('_token') != '') {
            $regras = [
                'name' => 'required',
                'ISBN' => 'required',
                'value' => 'required'
            ];
    
            $feedback = [
                'required' => 'O atributo :attribute deve ser preenchido'
            ];
    
            $request->validate($regras, $feedback);

            $bookStore = new BookStore();
            $bookStore->create($request->all());

            $msg = "Entrada criada com sucesso";

        } else {
            return redirect()->route('site.login',['erro' => 2]);
        }

        return redirect()->route('site.home',['msg' => $msg]);
    }
}
