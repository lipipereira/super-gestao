<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$products = Product::paginate(10);

        // Lazy Loading - Carregamento Preguiçoso
        //$products = Item::paginate(10);

        // Eager Loading - Carregamento Apressado
        $products = Item::with(['productDetail'])->paginate(10);

        /*
        foreach ($products as $key => $product) {
            $productDetail = ProductDetail::where('produto_id', $product->id)->first();
            if (isset($productDetail)) {
                $products[$key]['comprimento'] = $productDetail->comprimento;
                $products[$key]['largura'] = $productDetail->largura;
                $products[$key]['altura'] = $productDetail->altura;
            }
        }
        */

        return view('app.product.index', [
            'products' => $products,
            'request' => $request->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('app.product.create', ['units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo "nome" deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo "nome" deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo "Descrição" deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo "Descrição" deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo "Peso" dever ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];
        $request->validate($regras, $feedback);

        Product::create($request->all());

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('app.product.show', [
            'produto' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        return view('app.product.edit', ['produto' => $product, 'unidades' => $units]);
        //return view('app.product.create',['produto' => $product, 'unidades' => $units]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
