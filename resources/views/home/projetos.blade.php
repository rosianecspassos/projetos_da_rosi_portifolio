<!-- Projetos -->
<h4 class="text-center mb-4 border-bottom pb-2">Projetos</h4>
<div class="row justify-content-center">

  @foreach($projetos as $projeto)
    <div class="col-md-4 mb-3">
      <div class="card h-100">

        @if($projeto->imagem)
          <img src="{{ asset('storage/' . $projeto->imagem) }}" class="card-img-top mt-3 mb-3" alt="{{ $projeto->nome_projeto }}">
        @endif

        <div class="card-body">
          <h5 class="card-title">{{ $projeto->nome_projeto }}</h5>
          <p class="card-text">{{ $projeto->descricao }}</p>
          <a href="{{ $projeto->link }}" target="_blank" style="text-decoration: none; color: inherit;">
            Ver Código
          </a>
        </div>

      </div>
    </div>
  @endforeach

</div>

<div class="text-center">
  <a href="{{ route('projetos.index') }}"class="btn btn-outline-dark">Ver todos</a>
</div>


