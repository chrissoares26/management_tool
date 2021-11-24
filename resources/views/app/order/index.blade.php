@extends('app.layouts.basic')

@section('title', 'Order')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>List of Orders</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.create') }}">Add New</a></li>
                <li><a href="">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($orders as $order )
                                <tr>
                                    <td>{{ $order->id}}</td>
                                    <td> {{ $order->customer_id}}</td>
                                    <td><a href="{{ route('order-product.create', ['order' => $order->id])}}">Add Product</a></td>
                                    <td><a href="{{ route('order.show', ['order' => $order->id])}}">View</a></td>
                                    <td>
                                        <form id="form_{{ $order->id }}" method="post" action="{{ route('order.destroy', ['order' => $order->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $order->id }}').submit()">Delete</a>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('order.edit', ['order' => $order->id])}}">Edit</a></td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                
                {{ $orders->appends($request)->links() }}
               
            </div>
        </div>
    </div>
@endsection

