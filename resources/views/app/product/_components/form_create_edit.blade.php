@if (isset($products->id))
    <form action="{{ route('product.update', ['product' => $products->id]) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('product.store') }}" method="POST">
@endif
@csrf
<select name="fornecedor_id">
    <option>-- Selecione o fornecedor --</option>
    @foreach ($suppliers as $supplier)
        <option value="{{ $supplier->id }}"
            {{ ($products->fornecedor_id ?? Old('fornecedor_id')) == $supplier->id ? 'selected' : '' }}>
            {{ $supplier->nome }}</option>
    @endforeach
</select>
{{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

<input type="text" name="nome" value="{{ $products->nome ?? old('nome') }}" class="borda-preta" placeholder="Nome">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<input type="text" name="descricao" value="{{ $products->descricao ?? old('descricao') }}" class="borda-preta"
    placeholder="Descrição">
{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

<input type="text" name="peso" value="{{ $products->peso ?? old('peso') }}" class="borda-preta"
    placeholder="Peso">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}

<select name="unidade_id">
    <option>-- Selecione a unidade de medida --</option>
    @foreach ($units as $unit)
        <option value="{{ $unit->id }}"
            {{ ($products->unidade_id ?? Old('unidade_id')) == $unit->id ? 'selected' : '' }}>
            {{ $unit->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
<button type="submit" class="bordas-preta">Cadastrar</button>
</form>
