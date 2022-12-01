{{-- inherit from view base --}}
@extends('dashboard')

{{-- create a section to specific code --}}
@section('content')
    @if (!is_null($livros))
        <table class="table table-striped" style="padding-top: 10px;">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Qtd. de Páginas</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Gênero</th>
                    <th colspan="3">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                    <tr>
                        <td class="align-middle">{{ $livro->titulo }}</td>
                        <td class="align-middle">{{ $livro->paginas }}</td>
                        <td class="align-middle">{{ $livro->autor }}</td>
                        <td class="align-middle">{{ $livro->editora }}</td>
                        <td class="align-middle">{{ $livro->genero->nome }}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('livros.show', $livro->id) }}">Mostrar</a>
                        </td>
                        <td class="align-middle text-center">
                            <a href="{{ route('livros.edit', $livro->id) }}">Editar</a>
                        </td>
                        <td class="align-middle text-center">
                            <form action="{{ route('livros.destroy', $livro->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button style="outline: none; padding: 5px; border: 0px; box-sizing: none; background-color: transparent;" type="submit">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>No studio was found!</h3>
    @endif
@endsection