@extends('projetos.default')

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
                <th>Imagem</th>
                <th>Nome do projeto</th>
                <th>Link</th>
                <th>Descrição</th>
            </tr>
          
            <tbody>
            @foreach($projetos as $projeto)
<tr>

    <td>{{ $projeto->id }}</td>
    <td>

    @if($projeto->imagem && $projeto->imagem !== 'imagem.jpg')
    <img src="{{ asset('storage/' . $projeto->imagem) }}" class="card-img-top" alt="{{ $projeto->nome_projeto }}" style="height:52px; widht:50px;">
@else
    <img src="{{ asset('images/imagem.jpg') }}" class="card-img-top" alt="Imagem padrão" style="height:52px; widht:50px;">
@endif


</td>

<td>{{ $projeto->imagem }}</td>
    <td>{{ $projeto->nome_projeto }}</td>
    <td>@if($projeto->link)
    <a href="{{ $projeto->link }}" target="_blank" style="text-decoration: none; color: inherit;">
@endif
    <div class="card h-100">...</div>
@if($projeto->link)
    </a>
@endif
</td>
    <td>{{ $projeto->descricao }}</td>
    <td>
    <a href="{{ route('projetos.edit', ['id' => $projeto->id]) }}" class="btn btn-sm btn-primary">Editar</a>
        <form action="{{ route('projetos.destroy', ['id'=>$projeto->id]) }}" method="POST" class="d-inline">
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
