@if(isset($product_detail->id))
                    <form method="post" action="{{ route('product-detail.update', ['product_detail' => $product_detail->id])}}">
                        @csrf
                        @method('PUT')
                @else
                    <form method="post" action="{{ route('product-detail.store') }}">
                        @csrf
                @endif
                    <input type="text" name="product_id" value="{{ $product_detail->product_id ?? old('product_id') }}"placeholder="Product ID" class="borda-preta">
                    {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}

                    <input type="text" name="size" value="{{ $product_detail->size ?? old('size') }}" placeholder="Size" class="borda-preta">
                    {{ $errors->has('size') ? $errors->first('size') : '' }}

                    <input type="text" name="width" value="{{ $product_detail->width ?? old('width') }}" placeholder="Width" class="borda-preta">
                    {{ $errors->has('width') ? $errors->first('width') : '' }}

                     <input type="text" name="height" value="{{ $product_detail->height ?? old('height') }}" placeholder="Height" class="borda-preta">
                    {{ $errors->has('height') ? $errors->first('height') : '' }}

                    <select name="unit_id">
                        <option>--Select the measuring unit</option>
                        @foreach ($units as $unit )
                           <option value="{{$unit->id}}" {{ ($product_detail->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : ''}}>{{$unit->description}}</option> 
                        @endforeach
                        
                    </select>
                    {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}
                    @if(isset($product_detail->id))
                    <button type="submit" class="borda-preta">Update</button>
                    @else 
                    <button type="submit" class="borda-preta">Add new</button>
                    @endif
                </form>