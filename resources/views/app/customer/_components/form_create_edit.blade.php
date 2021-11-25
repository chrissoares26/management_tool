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

                    <input type="text" name="phone" value="{{ $customer->phone ?? old('phone') }}"placeholder="Phone" class="borda-preta">
                    {{ $errors->has('phone') ? $errors->first('phone') : '' }}

                    <input type="text" name="email" value="{{ $customer->email ?? old('email') }}"placeholder="Email" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <input type="text" name="address" value="{{ $customer->address ?? old('address') }}"placeholder="Address" class="borda-preta">
                    {{ $errors->has('address') ? $errors->first('address') : '' }}

                    <input type="text" name="city" value="{{ $customer->city ?? old('city') }}"placeholder="City" class="borda-preta">
                    {{ $errors->has('city') ? $errors->first('city') : '' }}

                    <input type="text" name="state" value="{{ $customer->state ?? old('state') }}"placeholder="State" class="borda-preta">
                    {{ $errors->has('state') ? $errors->first('state') : '' }}

                    <input type="text" name="zip" value="{{ $customer->zip ?? old('zip') }}"placeholder="Zip Code" class="borda-preta">
                    {{ $errors->has('zip') ? $errors->first('zip') : '' }}

                    <input type="text" name="country" value="{{ $customer->country ?? old('country') }}"placeholder="Country" class="borda-preta">
                    {{ $errors->has('country') ? $errors->first('country') : '' }}

                
                    @if(isset($customer->id))
                    <button type="submit" class="borda-preta">Update</button>
                    @else 
                    <button type="submit" class="borda-preta">Add new</button>
                    @endif
                </form>