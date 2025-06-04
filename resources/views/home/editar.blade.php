@extends('home.default')

@section('title')
    Projetos da Rosi | Editar  
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<div class="container-fluid w-100">
    <table class="table table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Título</th>
                <th>Idioma</th>
                <th>Formação</th>
                <th>Grau</th>
                <th>Instituição</th>
                <th>Áreas de Interesse</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($principais as $principal)
                <tr>
                    <td>{{ $principal->id }}</td>
                    <td>
    <img
        src="{{ !empty($principal->foto_perfil) ? asset($principal->foto_perfil) : asset('images/foto.png') }}"
        class="rounded-circle" style="width: 60px;">
</td>
                    <td>{{ $principal->nome }}</td>
                    <td>{{ $principal->titulo_academico }}</td>
                    <td>
                        @php
                            $idiomaCores = [
                                'espanhol' => 'danger',
                                'inglês' => 'primary',
                                'português' => 'success',
                            ];
                        @endphp
                        @if(!empty($principal->idioma))
                            @php
                                $idiomas = is_array($principal->idioma) ? $principal->idioma : explode(',', $principal->idioma);
                            @endphp
                            @foreach($idiomas as $item)
                                @foreach(explode(',', $item) as $idiomaRaw)
                                    @php
                                        $idioma = strtolower(trim(str_replace(['[', ']', '"'], '', $idiomaRaw)));
                                        $cor = $idiomaCores[$idioma] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $cor }}">{{ ucfirst($idioma) }}</span>
                                @endforeach
                            @endforeach
                        @endif
                    </td>
                    <td>{{ is_array($principal->formacao) ? implode(', ', $principal->formacao) : $principal->formacao }}</td>
                    <td>{{ is_array($principal->grau) ? implode(', ', $principal->grau) : $principal->grau }}</td>
                    <td>{{ is_array($principal->instituicao) ? implode(', ', $principal->instituicao) : $principal->instituicao }}</td>
                    <td>
                        @php
                            $areas = is_array($principal->areas) ? $principal->areas : explode(',', $principal->areas);
                        @endphp
                        @foreach($areas as $index => $area)
                            @php
                                $area = trim(str_replace(['[', ']', '"'], '', $area));
                                $cor = ['danger','info','success','warning','dark'][$index % 5];
                            @endphp
                            <span class="badge bg-{{ $cor }}">{{ $area }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('home.edit', ['id'=>$principal->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                    </td>
                </tr>

                {{-- Linha extra para experiência e botão de deletar --}}
                <tr>
                    <td colspan="10" class="bg-light">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                @if(!empty($principal->experiencia))
                                    <h6><i class="fa fa-briefcase me-1"></i> Experiência</h6>
                                    <ul class="mb-2">
                                        @php
                                            $experiencias = is_array($principal->experiencia)
                                                ? $principal->experiencia
                                                : explode(',', $principal->experiencia);
                                        @endphp
                                        @foreach($experiencias as $item)
                                            @foreach(explode(',', $item) as $exp)
                                                @php
                                                    $exp = trim(str_replace(['[', ']', '"'], '', $exp));
                                                @endphp
                                                <li>{{ $exp }}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <form action="{{ route('home.destroy', ['id'=>$principal->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
