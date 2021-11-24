@extends('app.layouts.basic')

@section('title', 'Product')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>View Product</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}">Go Back</a></li>
                <li><a href="{{ route('product.index') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align:left;">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $product->id }}</td>
                    </tr>
                     <tr>
                        <td>Name:</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                     <tr>
                        <td>Description:</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                     <tr>
                        <td>Weight:</td>
                        <td>{{ $product->weight }} lb</td>
                    </tr>
                     <tr>
                        <td>Measuring Unit:</td>
                        <td>{{ $product->unit_id }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection