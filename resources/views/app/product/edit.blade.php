@extends('app.layouts.basic')

@section('title', 'Product')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Edit Product</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}">Go Back</a></li>
                <li><a href="{{ route('product.index') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product._components.form_create_edit', ['product' => $product, 'units' => $units,  'vendors' => $vendors])
                @endcomponent
            </div>
        </div>
    </div>
@endsection