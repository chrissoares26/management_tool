@extends('app.layouts.basic')

@section('title', 'Customer')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>List of Customers</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('customer.create') }}">Add New</a></li>
                <li><a href="">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($customers as $customer )
                                <tr>
                                    <td>{{ $customer->name}}</td>
                                    <td><a href="{{ route('customer.show', ['customer' => $customer->id])}}">View</a></td>
                                    <td>
                                        <form id="form_{{ $customer->id }}" method="post" action="{{ route('customer.destroy', ['customer' => $customer->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $customer->id }}').submit()">Delete</a>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('customer.edit', ['customer' => $customer->id])}}">Edit</a></td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                
                {{ $customers->appends($request)->links() }}
               
            </div>
        </div>
    </div>
@endsection

