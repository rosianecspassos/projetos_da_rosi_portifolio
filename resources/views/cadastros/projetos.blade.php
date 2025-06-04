@extends('projetos.cadastrar')

@section('title', 'Projetos da Rosi')

@section('header')
@include('layouts.header')
@endsection

@section('formulario')
<div class="container mt-5 mb-4">
    <form method="POST" action="{{ route('projetos.store') }}" enctype="multipart/form-data">
        @csrf

        <div id="projetos-container">
            <div class="projeto border p-3 mb-3">
                <div class="mb-3">
                    <label>Imagem do Projeto</label>
                    <input type="file" name="imagens[]" class="form-control" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label>Nome do Projeto</label>
                    <input type="text" name="nome_projeto[]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Link</label>
                    <input type="url" name="link[]" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Descrição</label>
                    <textarea name="descricao[]" class="form-control" rows="3" required></textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mb-3">
    <div class="col"> 
                <button type="button" class="btn btn-primary me-2" onclick="adicionarNovoProjeto()">Adicionar Novo Projeto</button>
                <button type="button" class="btn btn-danger mt-1" onclick="removerCampo()">Remover</button>
            </div>
   <div class="col"> 
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

 <div class="col"> 
            <a href="{{ route('projetos.editar') }}" class="btn btn-danger">Editar</a> 
        </div>


        </div>
    </form>
</div>

<script>
    function adicionarNovoProjeto() {
        const container = document.getElementById('projetos-container');
        const projetoHTML = `
            <div class="projeto border p-3 mb-3">
                <div class="mb-3">
                    <label>Imagem do Projeto</label>
                    <input type="file" name="imagens[]" class="form-control" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label>Nome do Projeto</label>
                    <input type="text" name="nome_projeto[]" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Link</label>
                    <input type="url" name="link[]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Descrição</label>
                    <textarea name="descricao[]" class="form-control" rows="3" required></textarea>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', projetoHTML);
    }

    function removerCampo() {
        const container = document.getElementById('projetos-container');
        const projetos = container.getElementsByClassName('projeto');
        if (projetos.length > 1) {
            container.removeChild(projetos[projetos.length - 1]);
        }
    }
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
