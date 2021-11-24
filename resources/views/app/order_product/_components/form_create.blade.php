<form method="post" action="{{ route('order-product.store', ['order' => $order]) }}">
    @csrf
<select name="product_id">
<option>--Select the product</option>
@foreach ($products as $product )
    <option value="{{$product->id}}" {{ old('customer_id') == $product->id ? 'selected' : ''}}>{{$product->name}}</option> 
@endforeach
                        
</select>
{{ $errors->has('product_id') ? $errors->first('product_id') : '' }}
<button type="submit" class="borda-preta">Add New</button>
</form>