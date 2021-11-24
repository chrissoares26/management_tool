@extends('site.layouts.basic')
@section('title', $title)
@section('content')


        <div class="conteudo-destaque">
        
            <div class="esquerda">
                <div class="informacoes">
                    <h1>Super Management Tool</h1>
                    <p>Perfect management software for your business<p>
                    <div class="chamada">
                        <img src="{{ asset('img/check.png')}}">
                        <span class="texto-branco">Easy management</span>
                    </div>
                    <div class="chamada">
                        <img src="{{ asset('img/check.png')}}">
                        <span class="texto-branco">Your company in the cloud</span>
                    </div>
                </div>

                <div class="video">
                    <img src="{{ asset('img/player_video.jpg')}}">
                </div>
            </div>

            <div class="direita">
                <div class="contato">
                    <h1>Contact</h1>
                    <p>If you have any question, use the form to contact our team.<p>
                    @component('site.layouts._components.form_contact', ['class' => 'borda-branca', 'contact_reasons' => $contact_reasons])

                    @endcomponent
                </div>
            </div>
        </div>
@endsection