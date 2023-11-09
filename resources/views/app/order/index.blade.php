@extends('app.layouts.basico')
@section('title', 'Pedidos')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.create') }}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->cliente_id }}</td>
                                <td><a href="{{ route('order-product.create', ['order' => $order->id]) }}">Adicionar
                                        produtos</a>
                                </td>
                                <td><a href="{{ route('order.show', ['order' => $order->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $order->id }}" method="POST"
                                        action="{{ route('order.destroy', ['order' => $order->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $order->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('order.edit', ['order' => $order->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->appends($request)->links() }}
                <br>
                Exibindo {{ $orders->count() }} produtos de {{ $orders->total() }} (de {{ $orders->firstItem() }} a
                {{ $orders->lastItem() }})
            </div>
        </div>
    </div>
@endsection
