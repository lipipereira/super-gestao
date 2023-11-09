@if (isset($orders->id))
    <form action="{{ route('order.update', ['order' => $orders->id]) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('order.store') }}" method="POST">
@endif
@csrf
<select name="cliente_id">
    <option>-- Selecione o cliente --</option>
    @foreach ($clients as $client)
        <option value="{{ $client->id }}"
            {{ ($orders->cliente_id ?? Old('cliente_id')) == $client->id ? 'selected' : '' }}>
            {{ $client->nome }}</option>
    @endforeach
</select>
{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

<button type="submit" class="bordas-preta">Cadastrar</button>
</form>
