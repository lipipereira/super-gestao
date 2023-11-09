@extends('app.layouts.basico')
@section('title', 'Produto')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.create') }}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->nome }}</td>
                                <td>{{ $product->descricao }}</td>
                                <td>{{ $product->supplier->nome }}</td>
                                <td>{{ $product->peso }}</td>
                                <td>{{ $product->unidade_id }}</td>
                                <td>{{ $product->productDetail->comprimento ?? '' }}</td>
                                <td>{{ $product->productDetail->altura ?? '' }}</td>
                                <td>{{ $product->productDetail->largura ?? '' }}</td>
                                <td><a href="{{ route('product.show', ['product' => $product->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $product->id }}" method="POST"
                                        action="{{ route('product.destroy', ['product' => $product->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $product->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('product.edit', ['product' => $product->id]) }}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach ($product->order as $order)
                                        <a href="{{ route('order-product.create', ['order' => $order->id]) }}">
                                            Pedido: {{ $order->id }},
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->appends($request)->links() }}
                <br>
                Exibindo {{ $products->count() }} produtos de {{ $products->total() }} (de {{ $products->firstItem() }} a
                {{ $products->lastItem() }})
            </div>
        </div>
    </div>
@endsection
