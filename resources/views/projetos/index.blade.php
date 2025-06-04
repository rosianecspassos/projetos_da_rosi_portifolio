@extends('templates.projetos')

<!-- Título navegador --> 
@section('title', 'Projetos da Rosi')

<!-- Cabeçalho e menu --> 
@section('header')
    @include('layouts.header')
@endsection

<!-- Conteúdo -->
@section('conteudo')
<div class = "container-fluid w-100 "> 
    <div class = "container-fluid w-50"> 
<h2 class = "text-center text-light border border-light border-start-0 border-top-0 border-end-0 mt-3">Portifólio</h2> 
</div> 
<div class="row justify-content-center mt-5">
    @foreach($projetos as $projeto)
        <div class="col-md-3 mb-4">
            <a href="{{ $projeto->link }}" target="_blank" style="text-decoration: none; color: inherit;">
                <div class="card h-100">
                    @if($projeto->imagem)
                        <img src="{{ asset('storage/' . $projeto->imagem) }}" class="card-img-top mt-3 mb-3" alt="{{ $projeto->nome_projeto }}">
                    @else
                        <img src="{{ asset('images/imagem.jpg') }}" class="card-img-top mt-3 mb-3" alt="Imagem padrão">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $projeto->nome_projeto }}</h5>
                        <p class="card-text">{{ $projeto->descricao }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
</div> 
@endsection

<!-- Rodapé -->
@section('footer')
    @include('layouts.footer')
@endsection
