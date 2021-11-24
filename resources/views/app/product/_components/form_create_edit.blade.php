@if(isset($product->id))
                    <form method="post" action="{{ route('product.update', ['product' => $product->id])}}">
                        @csrf
                        @method('PUT')
                @else
                    <form method="post" action="{{ route('product.store') }}">
                        @csrf
                @endif

                <select name="vendor_id">
                        <option>--Select the vendor</option>
                        @foreach ($vendors as $vendor )
                           <option value="{{$vendor->id}}" {{ ($product->vendor_id ?? old('vendor_id')) == $vendor->id ? 'selected' : ''}}>{{$vendor->name}}</option> 
                        @endforeach
                        
                    </select>
                    {{ $errors->has('vendor_id') ? $errors->first('vendor_id') : '' }}
                    <input type="text" name="name" value="{{ $product->name ?? old('name') }}"placeholder="Name" class="borda-preta">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="description" value="{{ $product->description ?? old('description') }}" placeholder="Description" class="borda-preta">
                    {{ $errors->has('description') ? $errors->first('description') : '' }}

                    <input type="text" name="weight" value="{{ $product->weight ?? old('weight') }}" placeholder="Weight" class="borda-preta">
                    {{ $errors->has('weight') ? $errors->first('weight') : '' }}

                    <select name="unit_id">
                        <option>--Select the measuring unit</option>
                        @foreach ($units as $unit )
                           <option value="{{$unit->id}}" {{ ($product->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : ''}}>{{$unit->description}}</option> 
                        @endforeach
                        
                    </select>
                    {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}
                    <button type="submit" class="borda-preta">Add New</button>
                </form>