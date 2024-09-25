<!-- resources/views/home.blade.php -->
@extends('cms.app')

@section('title', 'Jornal VDD')

@section('content')
    <div class="blog-container">
        <h2>Últimas Publicações</h2>
        <div class="blog-posts">
            <!-- Exemplo de Postagem de Blog -->
            <div class="blog-post">
                <img src="https://via.placeholder.com/150" alt="Imagem do Post 1">
                <h3>Título do Post 1</h3>
                <p>Uma breve descrição do Post 1. Este é o resumo que dá aos leitores uma ideia sobre o conteúdo do post.</p>
                <a href="">Leia mais</a>
            </div>
            <!-- Continue adicionando postagens conforme necessário -->
        </div>
    </div>
@endsection
