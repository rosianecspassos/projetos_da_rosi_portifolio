@extends('templates.home')

<!-- Título navegador --> 
@section('title', 'Projetos da Rosi')

<!-- Cabeçalho e menu --> 
@section('header')
    @include('layouts.header')
@endsection

<!-- Sobre -->
@section('conteudo')
<div class="row">
  
  <!-- Perfil -->
  <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
    <div class="card text-center">
      @foreach($principais as $principal)
        <img src="{{ auth()->check() && auth()->user()->foto_perfil ? asset(auth()->user()->foto_perfil) : asset('images/rosiane.png') }}"
             class="bg-light rounded-circle mt-3 mb-1 mx-auto"
             id="profile-image" style="width:120px; height:120px; object-fit:cover;">
        
        <div class="card-body">
          <h5 class="card-title">{{ $principal->nome }}</h5>
          <span class="badge text-bg-primary">{{ $principal->titulo_academico }}</span>
          
          @php
              $idiomaCores = [
                  'espanhol' => 'danger',
                  'inglês' => 'primary',
                  'português' => 'success',
              ];
              function decodificarUnicode($string) {
                  return preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function($matches) {
                      return mb_convert_encoding(pack('H*', $matches[1]), 'UTF-8', 'UCS-2BE');
                  }, $string);
              }
          @endphp

          <div class="mt-3">
            @if(is_array($principal->idioma) && count($principal->idioma) > 0)
              @foreach($principal->idioma as $item)
                @php $idiomasSeparados = explode(',', $item); @endphp
                @foreach($idiomasSeparados as $idiomaRaw)
                  @php
                      $idiomaLimpado = decodificarUnicode(trim($idiomaRaw));
                      $idioma = strtolower(str_replace(['[', ']', '"'], '', $idiomaLimpado));
                      $cor = $idiomaCores[$idioma] ?? 'secondary';
                  @endphp
                  <span class="badge bg-{{ $cor }}">{{ ucfirst($idioma) }}</span>
                @endforeach
              @endforeach
            @elseif(!is_array($principal->idioma))
              @php $idiomasSeparados = explode(',', $principal->idioma); @endphp
              @foreach($idiomasSeparados as $idiomaRaw)
                @php
                    $idiomaLimpado = decodificarUnicode(trim($idiomaRaw));
                    $idioma = strtolower(str_replace(['[', ']', '"'], '', $idiomaLimpado));
                    $cor = $idiomaCores[$idioma] ?? 'secondary';
                @endphp
                <span class="badge bg-{{ $cor }}">{{ ucfirst($idioma) }}</span>
              @endforeach
            @endif
          </div>

          <!-- Redes sociais -->
          <div class="redes_sociais mt-3">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="https://github.com/rosianecspassos"><i class="fa fa-github"></i></a></li>
              <li class="list-inline-item"><a href="https://api.whatsapp.com/send?phone=5534996619291"><i class="fa fa-whatsapp"></i></a></li>
              <li class="list-inline-item"><a href="https://www.linkedin.com/in/rosiane-cristina-souza-dos-passos-38390645/"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div> <!-- card-body -->
      @endforeach
    </div>
  </div>

  <!-- Formação + Experiência + Áreas -->
  <div class="col-lg-9 col-md-8">
    <div class="row">
      
      <!-- Formação Acadêmica -->
      <div class="col-md-6 mb-3">
        <h5><i class="fa fa-graduation-cap"></i> Formação acadêmica</h5>
        @foreach($principais as $principal)
          @foreach ($principal->formacoes_completas as $formacao)
            <p>Formação: {{ $formacao['formacao'] }}</p>
            <p>Grau: {{ $formacao['grau'] }}</p>
            <p>Instituição: {{ $formacao['instituicao'] }}</p>
          @endforeach
        @endforeach
      </div>

      <!-- Experiência -->
      <div class="col-md-6 mb-3">
        <h5><i class="fa fa-briefcase"></i> Experiência</h5>
        @foreach($principais as $principal)
          @if(is_array($principal->experiencia) && count($principal->experiencia) > 0)
            <ul class="ps-3">
              @foreach($principal->experiencia as $item)
                @foreach(explode(',', $item) as $experienciaSeparada)
                  @php
                      $experienciaDecodificada = decodificarUnicode(trim(str_replace(['[', ']', '"'], '', $experienciaSeparada)));
                  @endphp
                  <li>{{ $experienciaDecodificada }}</li>
                @endforeach
              @endforeach
            </ul>
          @elseif(!empty($principal->experiencia))
            <ul class="ps-3">
              @foreach(explode(',', $principal->experiencia) as $experienciaSeparada)
                @php
                    $experienciaDecodificada = decodificarUnicode(trim(str_replace(['[', ']', '"'], '', $experienciaSeparada)));
                @endphp
                <li>{{ $experienciaDecodificada }}</li>
              @endforeach
            </ul>
          @endif
        @endforeach
      </div>
    </div>

    <!-- Áreas de Interesse -->
    <div class="mt-3">
      <h5><i class="fa fa-flag"></i> Áreas de Interesse</h5>
      @php
          $badgeColors = ['danger', 'success', 'warning', 'info', 'dark'];
      @endphp
      @foreach($principais as $principal)
        @if (is_array($principal->areas) && count($principal->areas) > 0)
          @foreach($principal->areas as $item)
            @php $areasSeparadas = explode(',', $item); @endphp
            @foreach($areasSeparadas as $index => $areaRaw)
              @php
                  $area = trim(str_replace(['[', ']', '"'], '', $areaRaw));
                  $color = $badgeColors[$index % count($badgeColors)];
              @endphp
              <span class="badge bg-{{ $color }}">{{ $area }}</span>
            @endforeach
          @endforeach
        @elseif (!is_array($principal->areas))
          @php $areasSeparadas = explode(',', $principal->areas); @endphp
          @foreach($areasSeparadas as $index => $areaRaw)
            @php
                $area = trim(str_replace(['[', ']', '"'], '', $areaRaw));
                $color = $badgeColors[$index % count($badgeColors)];
            @endphp
            <span class="badge bg-{{ $color }}">{{ $area }}</span>
          @endforeach
        @endif
      @endforeach
    </div>

    <!-- Botão "Saiba Mais" -->
    <div class="mt-3">
      <a href="{{ route('sobre.index') }}" class="btn btn-outline-primary">
        Saiba Mais <i class="fa fa-plus"></i>
      </a>
    </div>
  </div> <!-- col direita -->

</div> <!-- row -->

@endsection

 


@section('projetos')
    @include('home.projetos')  
@endsection

@section('cursos')
    @include('home.cursos')
@endsection

@section('contato')
    @include('home.contato')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
