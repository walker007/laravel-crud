@extends('layouts.app')

@section('title', 'Listagem de fornecedores')

@section('content')
    <div class="container">
        <div class="container-row">
            <a href="{{ route('fornecedores.create') }}" class="btn btn-success">Novo Fornecedor</a>
        </div>
        <div class="container-row">
            @if ($fornecedores->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <td>Fornecedor</td>
                            <td>Produtos</td>
                            <td class="text-right">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->produtos->count() }}</td>
                                <td class="text-right">
                                    {{ Form::open(['route' => ['fornecedores.delete', 'fornecedor_id' => $fornecedor->id], 'id' => 'delete_' . $fornecedor->id, 'method' => 'delete']) }}
                                    {{ Form::close() }}<a href="#!apagar"
                                        onclick="confimDelete('delete_{{ $fornecedor->id }}','Deseja realmente apagar {{ $fornecedor->nome }}?')"
                                        class="btn btn-error">Apagar</a><a
                                        href="{{ route('fornecedores.editar', ['fornecedor_id' => $fornecedor->id]) }}"
                                        class="btn btn-warning">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="msg msg-warning">
                    Ainda não exite nenhum Fornecedor cadastrado, por favor <a
                        href="{{ route('fornecedores.create') }}">Cadastre
                        um
                        Fornecedor</a>.
                </div>
            @endif
        </div>
        <div class="container-row">
            {!! $fornecedores->links() !!}
        </div>
    </div>
@endsection
