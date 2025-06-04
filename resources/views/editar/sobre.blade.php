@extends('sobre.alterar')


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
<form action="{{ route('sobre.update', ['id' => $sobre->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
 <div class="container my-4">


        <div class="row">
            <!-- Coluna 1 -->
            <div class="col-md-6">
                <!-- Sobre -->
                <div class="mb-3">
                  <label for="desc_sobre" class="form-label">Sobre mim:</label>
  <textarea class="form-control" id="desc_sobre" rows="3"></textarea>
                </div>

              

                <!-- Cursos -->
                <div class="mb-3">
                    <label for="curso" class="form-label fw-bold">Cursos:</label>
                    <input type="text" class="form-control" name="curso" id="curso" placeholder="Laravel" required>
                </div>

                <!-- Link -->
                <div class="mb-3">
                    <label for="link_curso" class="form-label fw-bold">Link do curso:</label>
                 <input type="text" class="form-control" name="link_curso" id="curso"  required>

                </div>

                <!-- Descrição do curso -->
                <div class="mb-3">
           <label for="desc_curso" class="form-label">Descrição do curso:</label>
  <textarea class="form-control" id="desc_curso" rows="3"></textarea>      
                </div>
  <!-- Competencias -->
                <div class="mb-3">
                    <label for="competencia" class="form-label fw-bold">Competências:</label>
                    <input type="text" class="form-control" name="competencia" id="competencia" placeholder="PHP" required>
                </div>
        <!-- Botões -->
        <div class="text-center mt-4">
            <div class = "row"> 
                <div class="col">
            <button type="submit" class="btn btn-dark px-4">Enviar</button>
        
    </div> 
    <div class="col"> 
            <a href="" class="btn btn-success">Principal</a> 
        </div>

    </div> 
    </div> 


        
    </div>
  

   
</form>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
