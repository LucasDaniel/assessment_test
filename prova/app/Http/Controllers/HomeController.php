<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Models\BookStore;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware(LogAcessoMiddleware::class);
    }

    public function home(Request $request) {

        $msg = $request->get('msg') ? $request->get('msg') : '';

        $bookStore = new BookStore();
        $bookStoreList = $bookStore->get();

        return view('site.home', ['msg' => $msg, 'bookStoreList' => $bookStoreList]);

    }
}
