@extends('templates.sobre')

@section('title', 'Projetos da Rosi')

@section('header')
    @include('layouts.header')
@endsection

@section('conteudo')
    <h1 class="text-center mb-5">Sobre Mim</h1>

    <div class="row mb-5 align-items-center">
        <div class="col-md-4 text-center">
            <img src="images/rosiane.png" class="card-img-top rounded-circle mx-auto mt-3" style="width:120px; height:120px;">
            <div class="redes_sociais">
                <ul class="d-flex justify-content-center">
                    <li><a href="https://github.com/rosianecspassos"><i class="fa fa-github"></i></a></li>
                    <li><a href="https://api.whatsapp.com/send?phone=5534996619291"><i class="fa fa-whatsapp"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/rosiane-cristina-souza-dos-passos-38390645/"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-8">
            @if($sobres->isNotEmpty() && !empty($sobres->first()->desc_sobre))
                <p>{{ $sobres->first()->desc_sobre }}</p>
            @else
                <p>Nenhuma descrição "Sobre" disponível.</p>
            @endif
        </div>
    </div>

    <section class="mb-5">
        <h2>Cursos</h2>
        <div class="row g-3">
            @if($sobres->isNotEmpty() && is_array($sobres->first()->curso))
                @foreach($sobres->first()->curso as $index => $curso)
                    <div class="col-md-4">
                        <div class="card cursos-card p-3 h-100">
                            <h5 class="card-title">{{ $curso }}</h5>
                            <p class="card-text">
                                {{ $sobres->first()->desc_curso[$index] ?? 'Nenhuma descrição disponível.' }}
                            </p>
                            <p class="card-text">
                                @if(!empty($sobres->first()->link_curso[$index]))
                                    <a href="{{ $sobres->first()->link_curso[$index] }}" target="_blank" class="btn btn-outline-light btn-sm">
                                        Escola / Instituição
                                    </a>
                                @else
                                    Nenhum link disponível.
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-light fs-5">Nenhum curso disponível.</p>
            @endif
        </div>
    </section>

    <section class="mb-5">
        <h2>Competências</h2>
        @if($sobres->isNotEmpty() && is_array($sobres->first()->competencia))
            <ul>
                @foreach($sobres->first()->competencia as $competencia)
                    <li>{{ $competencia }}</li>
                @endforeach
            </ul>
        @else
            <p>Nenhuma competência disponível.</p>
        @endif
    </section>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
