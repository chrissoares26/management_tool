@extends('app.layouts.basic')

@section('title', 'Vendor')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Vendor - List</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.vendor.add') }}">New</a></li>
                <li><a href="{{ route('app.vendor') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Site</th>
                            <th>State</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($vendors as $vendor )
                                <tr>
                                    <th>{{ $vendor->name}}</th>
                                    <th>{{ $vendor->site}}</th>
                                    <th>{{ $vendor->state}}</th>
                                    <th>{{ $vendor->email}}</th>
                                    <th><a href="{{ route('app.vendor.edit', $vendor->id)}}">Edit</a></th>
                                    <th><a href="{{ route('app.vendor.delete', $vendor->id)}}">Delete</a></th>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                    <p>Product List</p>
                                    <table border="1" style="margin:20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vendor->products as $key => $product)
                                            
                                        
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                
                {{ $vendors->appends($request)->links() }}
               
            </div>
        </div>
    </div>
@endsection