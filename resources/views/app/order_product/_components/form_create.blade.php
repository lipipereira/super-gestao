<form action="{{ route('order-product.store', ['order' => $order]) }}" method="POST">
    @csrf
    <select name="produto_id">
        <option>-- Selecione o produto --</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}"
                {{ ($orders->produto_id ?? Old('produto_id')) == $product->id ? 'selected' : '' }}>
                {{ $product->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="number" name="quantidade" placeholder="Quantidade"
        value="{{ Old('quantidade') ? Old('quantidade') : '' }}" class="borda-preta">
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

    <button type="submit" class="bordas-preta">Cadastrar</button>
</form>
