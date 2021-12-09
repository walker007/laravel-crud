@extends('layouts.app')

@section('title', 'Listagem de marcas')

@section('content')
    <div class="container">
        <div class="container-row">
            <a href="{{ route('marcas.create') }}" class="btn btn-success">Nova Marca</a>
        </div>
        <div class="container-row">
            @if ($marcas->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <td>Marca</td>
                            <td class="text-right">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marcas as $marca)
                            <tr>
                                <td>{{ $marca->nome }}</td>
                                <td class="text-right">
                                    {{ Form::open(['route' => ['marcas.delete', 'marca_id' => $marca->id], 'id' => 'delete_' . $marca->id, 'method' => 'delete']) }}
                                    {{ Form::close() }}<a href="#!apagar"
                                        onclick="confimDelete('delete_{{ $marca->id }}','Deseja realmente apagar {{ $marca->nome }}?')"
                                        class="btn btn-error">Apagar</a><a
                                        href="{{ route('marcas.editar', ['marca_id' => $marca->id]) }}"
                                        class="btn btn-warning">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="msg msg-warning">
                    Ainda não exite nenhuma Marca cadastrada, por favor <a href="{{ route('marcas.create') }}">Cadastre
                        uma
                        Marca</a>.
                </div>
            @endif
        </div>
        <div class="container-row">
            {!! $marcas->links() !!}
        </div>
    </div>
@endsection
