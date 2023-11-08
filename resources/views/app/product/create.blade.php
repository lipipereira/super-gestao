@extends('app.layouts.basico')
@section('title', 'Produto')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product._components.form_create_edit', ['units' => $units])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
