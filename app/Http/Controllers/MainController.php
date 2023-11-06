<?php

namespace App\Http\Controllers;

use App\Models\ReasonContact;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $motivo_contatos = ReasonContact::all();

        return view('site.main',['title' => 'Principal','motivo_contatos'=>$motivo_contatos]);
    }
}
