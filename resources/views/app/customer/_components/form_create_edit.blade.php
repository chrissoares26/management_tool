@if(isset($customer->id))
                    <form method="post" action="{{ route('customer.update', ['customer' => $customer->id])}}">
                        @csrf
                        @method('PUT')
                @else
                    <form method="post" action="{{ route('customer.store') }}">
                        @csrf
                @endif
                    <input type="text" name="name" value="{{ $customer->name ?? old('name') }}"placeholder="Name" class="borda-preta">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                
                    <button type="submit" class="borda-preta">Add New</button>
                </form>