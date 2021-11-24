@extends('site.layouts.basic')
@section('title', $title)
@section('content')


        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Contact Us</h1>
            </div>

            <div class="informacao-pagina">
                <div class="contato-principal">
                    @component('site.layouts._components.form_contact', ['class' => 'borda-preta', 'contact_reasons' => $contact_reasons])
                    <p>Our team is will get back to you soon</p>
                    <p>The average response time is 48 hours</p>

                    @endcomponent
                </div>
            </div>  
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Social Media</h2>
                <img src="{{ asset('img/facebook.png')}}">
                <img src="{{ asset('img/linkedin.png')}}">
                <img src="{{ asset('img/youtube.png')}}">
            </div>
            <div class="area-contato">
                <h2>Contact</h2>
                <span>(801)666-6666</span>
                <br>
                <span>chris@supermanagement.com</span>
            </div>
            <div class="localizacao">
                <h2>Location</h2>
                <img src="{{ asset('img/mapa.png')}}">
            </div>
        </div>
@endsection