@extends('app.layouts.basic')

@section('title', 'Customer')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
                <p>Add Customer</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('customer.index') }}">Go Back</a></li>
                <li><a href="{{ route('customer.index') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.customer._components.form_create_edit', ['customer' => $customer])
                @endcomponent
                
            </div>
        </div>
    </div>
@endsection