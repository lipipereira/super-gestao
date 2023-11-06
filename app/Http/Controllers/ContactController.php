<?php

namespace App\Http\Controllers;

use App\Models\ReasonContact;
use Illuminate\Http\Request;
use App\Models\SiteContactModel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $motivo_contatos = ReasonContact::all();

        return view('site.contact',['title'=>'Contato','motivo_contatos'=>$motivo_contatos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'nome'=>'required|min:3|max:40',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required'
        ],
        [
            'nome.min' => 'O campo "nome" precisa ter no minino 3 caracteres',
            'nome.max' => 'O campo "nome" pode ter no máximo 40 caracteres',
            'email.email' => 'O campo "e-mail" dever ser válido',

            'required' => 'O campo :attribute precisa ser preenchido'
        ]);
        SiteContactModel::create($request->all());
        return redirect()->route('main.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
