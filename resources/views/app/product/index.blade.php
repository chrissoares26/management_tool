@extends('app.layouts.basic')

@section('title', 'Product')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>List of Product</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.create') }}">Add New</a></li>
                
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Vendor</th>
                            <th>Weight</th>
                            <th>Unit ID</th>
                            <th>Size</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($products as $product )
                                <tr>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->description}}</td>
                                    <td>{{ $product->vendor->name}}</td>
                                    <td>{{ $product->weight}}</td>
                                    <td>{{ $product->unit_id}}</td>
                                    <th>{{ $product->productDetail->size ?? ''}}</th>
                                    <th>{{ $product->productDetail->width ?? ''}}</th>
                                    <th>{{ $product->productDetail->height ?? ''}}</th>
                                    <td><a href="{{ route('product.show', ['product' => $product->id])}}">View</a></td>
                                    <td>
                                        <form id="form_{{ $product->id }}" method="post" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $product->id }}').submit()">Delete</a>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('product.edit', ['product' => $product->id])}}">Edit</a></td>
                                    
                                </tr>
                                <tr>
                                    <td colspan="12">
                                        <p>Orders</p>
                                        @foreach ($product->orders as $order )
                                            <a href="{{route('order.show', ['order' => $order->id])}}">
                                                Order: {{ $order->id }}, 
                                            </a>
                                           
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                
                {{ $products->appends($request)->links() }}
               
            </div>
        </div>
    </div>
@endsection

