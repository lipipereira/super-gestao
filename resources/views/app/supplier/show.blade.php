@extends('app.layouts.basico')
@section('title','Fornecedor')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.supplier.store') }}">Novo</a></li>
                <li><a href="{{ route('app.supplier.show') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                ... Listar ...
            </div>
        </div>
    </div>
@endsection
