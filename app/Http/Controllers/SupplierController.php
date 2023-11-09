<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('app.supplier.index');
    }

    public function show(Request $request)
    {
        $supplier = SupplierModel::with(['products'])->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(10);

        return view('app.supplier.show', [
            'fornecedores' => $supplier,
            'request' => $request->all()
        ]);
    }

    public function store(Request $request)
    {
        $mensagem = '';
        //Inserir
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo "nome" deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo "nome" deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo "UF" deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo "UF" deve ter no máximo 2 caracteres',
                'email' => 'O campo "E-mail" não foi preenchido corretamente'
            ];
            $request->validate($regras, $feedback);
            SupplierModel::create($request->all());

            $mensagem = 'Cadastro realizado com sucesso!';
        }

        //edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $supplier =  SupplierModel::find($request->input('id'));
            $update = $supplier->update($request->all());
            if ($update) {
                $mensagem = 'Atualização realizado com sucesso!';
            } else {
                $mensagem = 'Erro ao realizado atualização';
            }
            return redirect()->route('app.supplier.edit', [
                'id' => $request->input('id'),
                'msg' => $mensagem
            ]);
        }

        return view('app.supplier.store', ['msg' => $mensagem]);
    }

    public function edit(string $id, $msg = '')
    {
        $supplier = SupplierModel::find($id);
        return view('app.supplier.store', [
            'fornecedor' => $supplier,
            'msg' => $msg
        ]);
    }

    public function destroy(string $id)
    {
        $supplier = SupplierModel::find($id)->delete();
        return redirect()->route('app.supplier');
    }
}
