@extends('app.layouts.basico')
@section('title','Produto')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            @if (isset($produto->id))
                <p>Editar produto</p>
            @else
                <p>Adicionar produto</p>
            @endif
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @if (isset($produto->id))
                    <form action="{{ route('product.update',['product'=>$produto->id]) }}" method="POST">
                    @method('PUT')
                @else
                    <form action="{{ route('product.store') }}" method="POST">
                @endif
                @csrf
                    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" class="borda-preta" placeholder="Nome">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" class="borda-preta" placeholder="Descrição">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" class="borda-preta" placeholder="Peso">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    <select name="unidade_id" >
                        <option>-- Selecione a unidade de medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? Old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    <button  type="submit" class="bordas-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
