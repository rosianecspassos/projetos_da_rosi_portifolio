@extends('templates.projetos')

<!-- Título navegador --> 
@section('title', 'Projetos da Rosi')

<!-- Cabeçalho e menu --> 
@section('header')
    @include('layouts.header')
@endsection

<!-- Conteúdo -->
@section('conteudo')
    <h1 class="text-center mb-5">Portfólio</h1>
    <div class="row justify-content-center">
        @foreach($projetos as $projeto)
            <div class="col-md-4 mb-4">
                <a href="{{ $projeto->link }}" target="_blank" class="text-decoration-none text-dark">
                    <div class="card h-100">
                        @if($projeto->imagem)
                            <img src="{{ asset('storage/' . $projeto->imagem) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $projeto->nome_projeto }}">
                        @else
                            <img src="{{ asset('images/imagem.jpg') }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Imagem padrão">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $projeto->nome_projeto }}</h5>
                            <p class="card-text">{{ $projeto->descricao }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

<!-- Rodapé -->
@section('footer')
    @include('layouts.footer')
@endsection
