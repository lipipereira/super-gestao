@extends('app.layouts.basico')
@section('title', 'Cliente')
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('client.create') }}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->nome }}</td>
                                <td><a href="{{ route('client.show', ['client' => $client->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $client->id }}" method="POST"
                                        action="{{ route('client.destroy', ['client' => $client->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $client->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('client.edit', ['client' => $client->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $clients->appends($request)->links() }}
                <br>
                Exibindo {{ $clients->count() }} produtos de {{ $clients->total() }} (de {{ $clients->firstItem() }} a
                {{ $clients->lastItem() }})
            </div>
        </div>
    </div>
@endsection
