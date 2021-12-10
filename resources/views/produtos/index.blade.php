@extends('layouts.app')

@section('title', 'Listagem de produtos')

@section('content')
    <div class="container">
        <div class="container-row">
            <a href="{{ route('produtos.create') }}" class="btn btn-success">Novo produto</a>
        </div>
        <div class="container-row">
            @if ($produtos->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <td>Produto</td>
                            <td>Quantidade</td>
                            <td>Preço</td>
                            <td>Marca</td>
                            <td class="text-right">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->quantidade }}</td>
                                <td>{{ MoneyFormat::toMasked($produto->preco) }}</td>
                                <td>{{ $produto->marca->nome }}</td>
                                <td class="text-right">
                                    {{ Form::open(['route' => ['produtos.delete', 'produto_id' => $produto->id], 'id' => 'delete_' . $produto->id, 'method' => 'delete']) }}
                                    {{ Form::close() }}<a href="#!apagar"
                                        onclick="confimDelete('delete_{{ $produto->id }}','Deseja realmente apagar {{ $produto->nome }}?')"
                                        class="btn btn-error">Apagar</a>
                                    <a href="{{ route('produtos.editar', $produto->id) }}">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="msg msg-warning">
                    Ainda não exite nenhum produto cadastrado, por favor <a
                        href="{{ route('produtos.create') }}">Cadastre
                        um
                        produto</a>.
                </div>
            @endif
        </div>
        <div class="container-row">
            {!! $produtos->links() !!}
        </div>
    </div>
@endsection
