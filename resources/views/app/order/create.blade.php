@extends('app.layouts.basic')

@section('title', 'Order')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
                <p>Add Order</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.index') }}">Go Back</a></li>
                <li><a href="{{ route('order.index') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.order._components.form_create_edit', ['customers' => $customers])
                @endcomponent
                
            </div>
        </div>
    </div>
@endsection