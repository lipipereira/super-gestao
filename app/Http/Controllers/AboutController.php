<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware(LogAcessoMiddleware::class);
        or
        $this->middleware('log.acesso');
    }
    */

    public function index()
    {
        return view('site.about',['title'=>'Sobre Nós']);
    }
}
