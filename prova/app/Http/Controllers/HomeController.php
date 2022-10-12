<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware(LogAcessoMiddleware::class);
    }

    public function home(Request $request) {

        return view('site.home');

    }
}
