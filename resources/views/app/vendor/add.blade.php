@extends('app.layouts.basic')

@section('title', 'Vendor')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Vendor -  Add</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.vendor.add') }}">New</a></li>
                <li><a href="{{ route('app.vendor') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.vendor.add')}}">
                    <input type="hidden" name="id" value="{{ $vendor->id ?? ''}}">
                    @csrf
                    <input type="text" name="name" value="{{ $vendor->name ?? old('name') }}" placeholder="Name" class="borda-preta">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="site" value="{{ $vendor->site ?? old('site') }}" placeholder="Site" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="state" value="{{ $vendor->state ?? old('state') }}" placeholder="State" class="borda-preta">
                    {{ $errors->has('state') ? $errors->first('state') : '' }}

                    <input type="text" name="email" value="{{ $vendor->email ?? old('email') }}" placeholder="Email" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <button type="submit" class="borda-preta">Add New</button>
                </form>
            </div>
        </div>
    </div>
@endsection