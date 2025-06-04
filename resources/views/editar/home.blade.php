@extends('home.alterar')
@section('title', 'Projetos da Rosi')

<div class="container-fluid w-100">
@section('header')
@include('layouts.header')
@endsection
</div> 
@section('topo')
<div class="container my-5">
    <div class="btnAcesso">
        @include('profile.navlogin')
    </div>
    <h4 class="mb-4 text-center">Cadastro principal da Home</h4> 
</div>
@endsection
<div class="container-fluid w-100">
@section('formulario')
<form action="{{ route('home.update', ['id' => $principal->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="container my-4 pb-5">
        <div class="row">
            <!-- Coluna 1 -->
            <div class="col-md-6">
                <!-- Foto -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Alterar a foto de perfil</label>
                    <input class="form-control mb-3" type="file" name="foto" id="foto">
                </div>

                <!-- Nome -->
                <div class="mb-3">
                    <label for="nome" class="form-label fw-bold">Meu nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $principal->nome }}" required>
                </div>

                <!-- Cargo atual -->
                <div class="mb-3">
                    <label for="cargo_atual" class="form-label fw-bold">Cargo atual:</label>
                    <input type="text" class="form-control" name="cargo_atual" id="cargo_atual" value="{{ $principal->cargo_atual }}" required>
                </div>

                <!-- Título acadêmico -->
                <div class="mb-3">
                    <label for="titulo_academico" class="form-label fw-bold">Título acadêmico:</label>
                    <input type="text" class="form-control" name="titulo_academico" id="titulo_academico" value="{{ $principal->titulo_academico }}" required>
                </div>

                <!-- Idiomas -->
                <div class="mb-3">
                    <label for="idioma" class="form-label fw-bold">Idiomas:</label>
                    <div id="idioma-container">
                        @foreach($principal->idioma ?? [''] as $idioma)
                            <input type="text" name="idioma[]" value="{{ $idioma }}" class="form-control mb-2" required>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoIdioma()">Adicionar Idioma</button>
                </div>

                <!-- Áreas de interesse -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Áreas de Interesse:</label>
                    <div id="area-container">
                        @foreach($principal->areas ?? [''] as $area)
                            <input type="text" name="areas[]" value="{{ $area }}" class="form-control mb-2" required>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoArea()">Adicionar Área</button>
                </div>

                <!-- Experiência -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Experiência Profissional:</label>
                    <div id="exp-container">
                        @foreach($principal->experiencia ?? [''] as $exp)
                            <input type="text" name="experiencia[]" value="{{ $exp }}" class="form-control mb-2" required>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoExp()">Adicionar Experiência</button>
                </div>
            </div>

            <!-- Coluna 2 -->
            <div class="col-md-6">
                <!-- Formação -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Formação Acadêmica:</label>
                    <div id="formacao-container">
                        @foreach($principal->formacao ?? [''] as $form)
                            <input type="text" name="formacao[]" value="{{ $form }}" class="form-control mb-2" required>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoFormacao()">Adicionar Formação</button>
                </div>

                <!-- Instituição -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Instituição de Ensino:</label>
                    <div id="instituicao-container">
                        @foreach($principal->instituicao ?? [''] as $inst)
                            <input type="text" name="instituicao[]" value="{{ $inst }}" class="form-control mb-2" required>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoInstituicao()">Adicionar Instituição</button>
                </div>

                <!-- Grau -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Nível (Grau):</label>
                    <div id="grau-container">
                        @foreach($principal->grau ?? [''] as $g)
                            <input type="text" name="grau[]" value="{{ $g }}" class="form-control mb-2" required>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoGrau()">Adicionar Grau</button>
                </div>
            </div>
        </div>

        <!-- Botões finais -->
        <div class="d-flex justify-content-between mt-5">
            <a href="{{ route('home.index') }}" class="btn btn-success">Voltar</a>
            <button type="submit" class="btn btn-dark">Alterar</button>
        </div>
    </div>
</form>
</div>
@endsection
<div class="container-fluid w-100">
@section('footer')
@include('layouts.footer')
@endsection
</div> 