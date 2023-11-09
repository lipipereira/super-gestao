@extends('app.layouts.basico')
@section('title', 'Pedido')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.index') }}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.order._components.form_create_edit', ['clients' => $clients])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
