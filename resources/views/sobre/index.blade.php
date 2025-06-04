

@extends('templates.sobre')

@section('title', 'Projetos da Rosi')

@section('header')
    @include('layouts.header')
@endsection

@section('conteudo')
<div class="container py-5">

    {{-- Seção Sobre --}}
    <section class="bg-light rounded p-4 mb-5 shadow-sm">
        <div class="text-center">
            <h2 class="text-primary border-bottom border-primary pb-2 mb-4">Sobre</h2>

            @if($sobres->isNotEmpty() && !empty($sobres->first()->desc_sobre))
                <p class="text-dark fs-5">{{ $sobres->first()->desc_sobre }}</p>
            @else
                <p class="text-dark fs-5">Nenhuma descrição "Sobre" disponível.</p>
            @endif
        </div>
    </section>

    {{-- Seção Cursos --}}
    <section class="bg-primary text-light rounded p-4 mb-5 shadow-sm">
        <div class="text-center mb-4">
            <h2 class="border-bottom border-light pb-2">Cursos</h2>
        </div>
        <div class="row g-4">
            @if($sobres->isNotEmpty() && is_array($sobres->first()->curso))
                @foreach($sobres->first()->curso as $index => $curso)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 bg-primary border-0 shadow">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title fw-bold mb-3">{{ $curso }}</h4>
                                <p class="card-text text-light flex-grow-1">
                                    {{ $sobres->first()->desc_curso[$index] ?? 'Nenhuma descrição disponível.' }}
                                </p>
                                <div class="mt-3 text-end">
                                    @if(!empty($sobres->first()->link_curso[$index]))
                                    <a href="{{ $sobres->first()->link_curso[$index] }}" target="_blank" class="btn btn-outline-light btn-sm">Escola / Instituição: </a>
                                    @else
                                        <span class="text-light small fst-italic">Nenhum link disponível.</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-light fs-5">Nenhum curso disponível.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Seção Competências --}}
    <section class="competencias bg-light rounded p-4 shadow-sm">
        <div class="text-center mb-4">
            <h2 class="border-bottom border-primary pb-2">Principais Competências</h2>
        </div>
        <div class="row g-3 justify-content-center">
            @if($sobres->isNotEmpty() && is_array($sobres->first()->competencia))
                @foreach($sobres->first()->competencia as $competencia)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="p-3 bg-primary text-light rounded text-center shadow-sm">
                            <h5 class="mb-0">{{ $competencia }}</h5>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="fs-5">Nenhuma competência disponível.</p>
                </div>
            @endif
        </div>
    </section>

</div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
