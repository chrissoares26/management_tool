@extends('app.layouts.basic')

@section('title', 'Product Details')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Edit Product Details</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Go Back</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <h4>Product</h4>
            <div>Name: {{ $product_detail->item->name }}</div>
            <br>
            <div>Description: {{ $product_detail->item->description }}</div>
            <br>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product_detail._components.form_create_edit', ['product_detail' => $product_detail, 'units' => $units])
                @endcomponent
            </div>
        </div>
    </div>
@endsection