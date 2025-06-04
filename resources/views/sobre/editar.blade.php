@extends('sobre.default')

@section('title', 'Projetos da Rosi')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<div class="container-fluid w-100">
    <table class="table table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Sobre</th>
                <th>Competências</th>
                <th>Cursos</th>
                <th>Links do Curso</th>
                <th>Descrição dos Cursos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sobres as $sobre)
                <tr>
                    <td>{{ $sobre->id }}</td>
                    <td>{{ $sobre->desc_sobre }}</td>
                    <td>
                        <ul>
                            @foreach($sobre->competencia as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($sobre->curso as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($sobre->link_curso as $item)
                                <li><a href="{{ $item }}" target="_blank">{{ $item }}</a></li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($sobre->desc_curso as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('sobre.edit', $sobre->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('sobre.destroy', $sobre->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
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
