@extends('app.layouts.basic')

@section('title', 'Vendor')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Vendor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.vendor.add') }}">New</a></li>
                <li><a href="{{ route('app.vendor') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.vendor.list') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="borda-preta">
                    <input type="text" name="site" placeholder="Site" class="borda-preta">
                    <input type="text" name="state" placeholder="State" class="borda-preta">
                    <input type="text" name="email" placeholder="Email" class="borda-preta">
                    <button type="submit" class="borda-preta">Search</button>
                </form>
            </div>
        </div>
    </div>
@endsection