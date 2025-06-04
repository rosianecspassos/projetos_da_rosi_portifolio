
<div class="container-fluid w-100 align-content-center mt-1 mb-0">
    <h4 class= "mt-3 pb-3 text-center border-bottom border-primary ">Projetos </h4> 
    <div class="row justify-content-center mt-5">
    @foreach($projetos as $projeto)
        <div class="col-md-3 mb-4">
            <a href="{{ $projeto->link }}" target="_blank" style="text-decoration: none; color: inherit;">
                <div class="card h-100 text-center">
                    @if($projeto->imagem)
                        <img src="{{ asset('storage/' . $projeto->imagem) }}" class="card-img-top mt-3 mb-3" alt="{{ $projeto->nome_projeto }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $projeto->nome_projeto }}</h5>
                        <p class="card-text">{{ $projeto->descricao }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach


<div class="container-fluid text-center"> 
  <a href="{{ route('projetos.index') }} " class=" btn btn-primary text-light">Ver todos</a>
</div> 
</div>


</div>

