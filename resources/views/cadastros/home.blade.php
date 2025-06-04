@extends('home.cadastrar')

<!--Título navegador--> 

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
<form action="{{ route('home.index') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container my-4">
        <div class="row">
            <!-- Coluna 1 -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="foto" class="form-label">Escolha a foto de perfil</label>
                    <input class="form-control mb-3" type="file" name="foto" id="foto">
                </div>

                <div class="mb-3">
                    <label for="nome" class="form-label fw-bold">Meu nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Rosiane Cristina" required>
                </div>

                <div class="mb-3">
                    <label for="cargo_atual" class="form-label fw-bold">Cargo atual:</label>
                    <input type="text" class="form-control" name="cargo_atual" id="cargo_atual" placeholder="Desenvolvedor Jr." required>
                </div>

                <div class="mb-3">
                    <label for="titulo_academico" class="form-label fw-bold">Título acadêmico:</label>
                    <input type="text" class="form-control" name="titulo_academico" id="titulo_academico" placeholder="Especialista" required>
                </div>

                <div class="mb-3">
                    <label for="idioma" class="form-label fw-bold">Idiomas:</label>
                    <div id="idioma-container"></div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoIdioma()">Adicionar Idioma</button>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Áreas de Interesse:</label>
                    <div id="area-container"></div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoArea()">Adicionar Área</button>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Experiência Profissional:</label>
                    <div id="exp-container"></div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoExp()">Adicionar Experiência</button>
                </div>
            </div>

            <!-- Coluna 2 -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Formação Acadêmica:</label>
                    <div id="formacao-container"></div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoFormacao()">Adicionar Formação</button>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Instituição de Ensino:</label>
                    <div id="instituicao-container"></div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoInstituicao()">Adicionar Instituição</button>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nível:</label>
                    <div id="grau-container"></div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoGrau()">Adicionar Grau</button>
                </div>
            </div>
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-between mt-4">
<div class="col"> 
            <button type="submit" class="btn btn-dark px-4">Enviar</button>
</div>
<div class="col"> 
            <a href="{{ route('home.editar') }}" class="btn btn-danger">Editar</a> 
        </div>

        </div>
    </div>
</form>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
