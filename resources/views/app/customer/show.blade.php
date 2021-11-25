@extends('app.layouts.basic')

@section('title', 'Customer')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>View Customer</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('customer.index') }}">Go Back</a></li>
                
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align:left;">
                    <tr>
                        <td>Name:</td>
                        <td>{{ $customer->name }}</td>
                    </tr>
                     <tr>
                        <td>Phone:</td>
                        <td>{{ $customer->phone }}</td>
                    </tr>
                     <tr>
                        <td>Email:</td>
                        <td>{{ $customer->email }}</td>
                    </tr>
                     <tr>
                        <td>Address:</td>
                        <td>{{ $customer->address }}</td>
                    </tr>
                     <tr>
                        <td>City:</td>
                        <td>{{ $customer->city }}</td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td>{{ $customer->state }}</td>
                    </tr>
                    <tr>
                        <td>Zip Code:</td>
                        <td>{{ $customer->zip }}</td>
                    </tr>
                    <tr>
                        <td>Country:</td>
                        <td>{{ $customer->country }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection