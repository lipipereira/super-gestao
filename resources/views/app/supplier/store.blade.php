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
                <li><a href="{{ route('app.supplier.show') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="" method="POST">
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome">
                    <input type="text" name="site" class="borda-preta" placeholder="Site">
                    <input type="text" name="uf" class="borda-preta" placeholder="UF">
                    <input type="text" name="email" class="borda-preta" placeholder="E-mail">
                    <button  type="submit" class="bordas-preta">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
