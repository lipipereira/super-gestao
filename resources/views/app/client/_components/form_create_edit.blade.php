@if (isset($clients->id))
    <form action="{{ route('client.update', ['client' => $clients->id]) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('client.store') }}" method="POST">
@endif
@csrf
<input type="text" name="nome" value="{{ $clients->nome ?? old('nome') }}" class="borda-preta" placeholder="Nome">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<button type="submit" class="bordas-preta">Cadastrar</button>
</form>
