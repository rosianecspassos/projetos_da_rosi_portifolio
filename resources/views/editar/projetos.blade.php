@extends('projetos.alterar')

@section('title', 'Projetos da Rosi')

@section('header')
@include('layouts.header')
@endsection

@section('topo')
<div class="container m-5">
    <div class="btnAcesso">
        @include('profile.navlogin')
    </div>
    <h4 class="mb-4 text-center">Cadastro principal da Home</h4> 
@endsection

@section('formulario')
<form action="{{ route('projetos.update', $projeto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="container my-4">
        <div class="row">
            <!-- Coluna 1 -->
            <div class="col-md-6">
                <!-- Imagem -->
                <div class="mb-3">
                    <label for="imagem" class="form-label">Alterar imagem</label>
                    <input class="form-control mb-3" type="file" name="imagem" id="imagem">
                    @if ($projeto->imagem)
                        <img src="{{ asset('images/projetos/' . $projeto->imagem) }}" alt="Imagem do projeto" class="img-thumbnail" style="width: 150px;">
                    @endif
                </div>

                <!-- Nome do projeto -->
                <div class="mb-3">
                    <label for="nome_projeto" class="form-label fw-bold">Projeto:</label>
                    <input type="text" class="form-control" name="nome_projeto" id="nome_projeto" value="{{ $projeto->nome_projeto }}" required>
                </div>

                <!-- Link do projeto -->
                <div class="mb-3">
                    <label for="link" class="form-label fw-bold">Link:</label>
                    <input type="text" class="form-control" name="link" id="link" value="{{ $projeto->link }}" required>
                </div>

                <!-- Descrição do projeto -->
                <div class="mb-3">
                    <label for="descricao" class="form-label fw-bold">Descrição:</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="4" required>{{ $projeto->descricao }}</textarea>
                </div>
                
                <!-- Botões -->
                <div class="text-center mt-4 mb-5">
                    <div class="row"> 
                        <div class="col">
                            <button type="submit" class="btn btn-dark">Alterar</button>
                        </div> 
                        <div class="col"> 
                            <a href="{{ route('projetos.index') }}" class="btn btn-success">Voltar</a> 
                        </div>
                    </div> 
                </div>   
            </div>
        </div>
    </div>
</form>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
