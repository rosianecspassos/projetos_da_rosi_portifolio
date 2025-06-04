 <div class="container-fluid w-100" id="icon-grid">
<div class="container-fluid w-50"> 
    <h4 class="pb-2 border-bottom border-primary text-center">Cursos</h4>
</div> 

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
    @foreach($sobres as $sobre)

      <div class="col d-flex align-items-start">
        <div>
          <h3 class="fw-bold">>{{ $sobre->curso }}</h3>
          <p>{{ $sobre->desc_curso }} </p>
        <a href="{{ $sobre-> link_curso }}" target="_blank" class="btn btn-outline-light btn-sm">Ver Curso</a>
        </div>
      @endforeach


      </div>
     



  </div>
  <a href="{{ route('sobre.index') " class="text-light"><i class="fa fa-plus-square" aria-hidden="true"></i></a>

