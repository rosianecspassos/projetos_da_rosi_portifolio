@extends('sobre.cadastrar')
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

<form action="{{ route('sobre.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container my-4">


        <div class="row">
            <!-- Coluna 1 -->
            <div class="col-md-6">
                <!-- Sobre -->
                <div class="mb-3">
                  <label for="desc_sobre" class="form-label">Sobre mim:</label>
<textarea class="form-control" id="desc_sobre" name="desc_sobre"  rows="3"></textarea>
                </div>

              

                <!-- Cursos -->
                <div class="mb-3">
                <div id="curso-container"></div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoCurso()">Adicionar Curso</button>
                </div>
                </div>
  <!-- Competencias -->
                <div class="mb-3">
                   <div id="competencia-container"></div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="adicionarCampoCompetencia()">Adicionar Competencia</button>
                </div>
                </div>
        <!-- Botões -->
        <div class="text-center mt-4">
            <div class = "row"> 
                <div class="col">
            <button type="submit" class="btn btn-dark px-4">Enviar</button>
          
    </div> 

 <div class="col"> 
            <a href="{{ route('sobre.editar') }}" class="btn btn-danger">Editar</a> 
        </div>
    </div> 
    </div> 


        
    </div>
  
</form>
</div>
@endsection

</div>
@section('footer')
@include('layouts.footer')
@endsection