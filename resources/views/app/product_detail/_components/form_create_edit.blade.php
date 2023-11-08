@if (isset($productDetail->id))
    <form action="{{ route('product-detail.update', ['product_detail' => $productDetail->id]) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('product-detail.store') }}" method="POST">
@endif
@csrf
<input type="text" name="produto_id" value="{{ $productDetail->produto_id ?? old('produto_id') }}" class="borda-preta"
    placeholder="ID do produto">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<input type="text" name="comprimento" value="{{ $productDetail->comprimento ?? old('comprimento') }}"
    class="borda-preta" placeholder="Comprimento">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<input type="text" name="largura" value="{{ $productDetail->largura ?? old('largura') }}" class="borda-preta"
    placeholder="Largura">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<input type="text" name="altura" value="{{ $productDetail->altura ?? old('altura') }}" class="borda-preta"
    placeholder="Altura">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}

<select name="unidade_id">
    <option>-- Selecione a unidade de medida --</option>
    @foreach ($units as $unit)
        <option value="{{ $unit->id }}"
            {{ ($productDetail->unidade_id ?? Old('unidade_id')) == $unit->id ? 'selected' : '' }}>
            {{ $unit->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
@if (isset($productDetail->id))
    <button type="submit" class="bordas-preta">Salvar</button>
@else
    <button type="submit" class="bordas-preta">Cadastrar</button>
@endif
</form>
