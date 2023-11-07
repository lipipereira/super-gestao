@extends('app.layouts.basico')
@section('title','Fornecedor')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicinar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.supplier.store') }}">Novo</a></li>
                <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{ $msg ?? '' }}
                <form action="{{ route('app.supplier.store') }}" method="POST">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    @csrf
                    <input type="text" name="nome" value="{{ $fornecedor->nome ?? Old('nome') }}" class="borda-preta" placeholder="Nome">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="site" value="{{ $fornecedor->site ?? Old('site') }}" class="borda-preta" placeholder="Site">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="uf" value="{{ $fornecedor->uf ?? Old('uf') }}" class="borda-preta" placeholder="UF">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text" name="email" value="{{ $fornecedor->email ?? Old('email') }}" class="borda-preta" placeholder="E-mail">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button  type="submit" value="{{ Old('') }}" class="bordas-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
