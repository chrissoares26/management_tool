@extends('app.layouts.basic')

@section('title', 'Order Product')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
                <p>Add Product to Order</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.index') }}">Go Back</a></li>
                <li><a href="">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
        <h4>Order Details</h4>
               <p>Order ID: {{ $order->id }}</p>
               <p>Customer: {{ $order->customer->name}}</p>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <h4>Order Items</h4>
            <table border="1" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Order Date</th>
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody>
            @foreach ($order->products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->pivot->created_at->format('m/d/Y')}}</td>
                    {{-- <td><form id="form_{{$product->pivot->id}}" method="post" action="{{route('order-product.destroy', ['orderProduct' => $product->pivot->id, 'order_id' => $order->id ])}}">
                    @method('DELETE')
                    @csrf
                    <a href="#" onclick="document.getElementById('form_{{$product->pivot->id}}').submit()">Delete</a></form></td> --}}
                </tr>
             @endforeach
            </tbody>
            
            </table>
               
                
            </div>
        </div>
    </div>
@endsection