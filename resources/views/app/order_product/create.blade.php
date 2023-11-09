@extends('app.layouts.basico')
@section('title', 'Pedido produto')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar produtos ao pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.index') }}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $order->id }}</p>
            <p>Cliente: {{ $order->cliente_id }}</p>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.order_product._components.form_create', ['order' => $order, 'products' => $products])
                @endcomponent
                <h4>Itens do pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Data de inclusão no pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->nome }}</td>
                                <td>{{ $product->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form id="form_{{ $product->pivot->id }}" method="POST"
                                        action="{{ route('order-product.destroy', ['orderProduct' => $product->pivot->id, 'order_id' => $order->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $product->pivot->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
