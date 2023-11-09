<?php

namespace App\Http\Controllers;

use App\Models\{
    Order,
    OrderProduct,
    Product
};
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        $products = Product::all();
        return view('app.order_product.create', ['order' => $order, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Order $order)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto não existe',
            'quantidade.required' => 'Preenchar o campo quantidade'
        ];
        $request->validate($regras, $feedback);

        /*
        $orderProduct = new OrderProduct();
        $orderProduct->pedido_id = $order->id;
        $orderProduct->produto_id = $request->get('produto_id');
        $orderProduct->save();
        */

        /*
        OrderProduct::create([
            'pedido_id' => $order->id,
            'produto_id' => $request->get('produto_id'),
            'quantidade' => $request->get('quantidade')
        ]);
        */

        /*
        $order->products()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
        );
        */

        $order->products()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('order-product.create', ['order' => $order->id]);
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
    //public function destroy(Order $order, Product $product)
    public function destroy(OrderProduct $orderProduct, $order_id)
    {
        // Convencional
        /*
        OrderProduct::where([
            'pedido_id' => $order->id,
            'produto_id' => $product->id
        ])->delete();
        */

        // detach
        //$order->products()->detach($product->id);
        // ou
        // $product->order()->detach($order->id);

        $orderProduct->delete();

        return redirect()->route('order-product.create', ['order' => $order_id]);
    }
}
