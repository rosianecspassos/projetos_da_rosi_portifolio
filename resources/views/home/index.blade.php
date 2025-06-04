@extends('templates.home')

<!-- Título navegador --> 
@section('title', 'Projetos da Rosi')

<!-- Cabeçalho e menu --> 
@section('header')
    @include('layouts.header')
@endsection

<!-- Sobre --> 
@section('conteudo')
<div class="container-fluid w-100"> 
    <div class="row g-0"> <!-- Remove espaçamento entre colunas -->
        <!-- Coluna da esquerda (perfil e redes sociais) -->
        <div class="col-md-3 text-center">
            <div class="card pt-2 h-100 border-0 ms-4"> <!-- Remove borda e garante altura igual -->
                @foreach($principais as $principal)
                <img src="{{ auth()->check() && auth()->user()->foto_perfil ? asset(auth()->user()->foto_perfil) : asset('images/rosiane.png') }}" class="bg-light rounded-circle mt-3 mb-1" id="profile-image">
                <div class="card-body cardprincipal">
                    <h1 class="mb-2">{{ $principal->nome }} </h1>
                    <span class="badge text-bg-primary"> {{ $principal->titulo_academico }} </span>  
                </div>

                <div class="text-card mt-2 text-center idiomas"> 
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

                    <p class="card-text mb-0">
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
                    </p>
                </div>

                <div class="redes_sociais"> 
                    <ul class="mt-5 text-center">  
                        <li><a href="https://github.com/rosianecspassos"><i class="fa fa-github" style="font-size:24px"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=5534996619291"><i class="fa fa-whatsapp" style="font-size:24px"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/rosiane-cristina-souza-dos-passos-38390645/"><i class="fa fa-linkedin" style="font-size:24px"></i></a></li>
                    </ul> 
                </div> 
                @endforeach
            </div>
        </div>

        <!-- Coluna da direita (Formação, Experiência e Áreas de Interesse) -->
        <div class="col-md-9">
            <div class="row pt-2 h-100 w-100 ms-5">
                <div class="card-body">
                    <div class="row">
                        <!-- Formação Acadêmica -->
                        <div class="col-md-6">
                            <h5 class="card-title mt-2 mb-1"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Formação acadêmica</h5>
                            <div class="card-text mb-0 text-light">
                                @foreach($principais as $principal)
                                    @foreach ($principal->formacoes_completas as $formacao)
                                        <p>Formação: {{ $formacao['formacao'] }}</p>
                                        <p>Grau: {{ $formacao['grau'] }}</p>
                                        <p>Instituição: {{ $formacao['instituicao'] }}</p>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <!-- Experiência -->
                        <div class="col-md-6">
                            <h5 class="card-title mt-2 ms-4 text-left mb-1"><i class="fa fa-briefcase" aria-hidden="true"></i> Experiência</h5>
                            <div class="experiencia text-light ">
                                @foreach($principais as $principal)
                                    @if(is_array($principal->experiencia) && count($principal->experiencia) > 0)
                                        <ul class="lista-experiencia">
                                            @foreach($principal->experiencia as $item)
                                                @foreach(explode(',', $item) as $experienciaSeparada)
                                                    @php
                                                        $experienciaDecodificada = decodificarUnicode(trim(str_replace(['[', ']', '"'], '', $experienciaSeparada)));
                                                    @endphp
                                                    <li class="me-5">{{ $experienciaDecodificada }}</li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    @elseif(!empty($principal->experiencia))
                                        <ul class="lista-experiencia">
                                            @foreach(explode(',', $principal->experiencia) as $experienciaSeparada)
                                                @php
                                                    $experienciaDecodificada = decodificarUnicode(trim(str_replace(['[', ']', '"'], '', $experienciaSeparada)));
                                                @endphp
                                                <li class="me-5">{{ $experienciaDecodificada }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div> <!-- fim da row -->

                    <!-- Áreas de Interesse -->
                    <div class="mt-4"> 
                        <h5 class="card-title mb-2"><i class="fa fa-flag" aria-hidden="true"></i> Áreas de Interesse</h5> 
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

                    <!-- Botão Saiba Mais -->
                    <div class="mt-3"> 
                        <a href="{{ route('sobre.index') }}" class="btn text-light me-5"> Saiba <i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
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
