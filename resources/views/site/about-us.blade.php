@extends('site.layouts.basic')
@section('title', $title)
@section('content')


        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Hi, I am the Super Management</h1>
            </div>

            <div class="informacao-pagina">
                <p>The Super Management is the online administrative control system that can transform and enhance your company's business.</p>
                <p>Developed with the highest technology for you to take care of what is most important, your business!</p>
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
                <h2>Contato</h2>
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