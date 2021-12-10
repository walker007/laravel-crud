@extends('layouts.app')

@section('title', 'Editar Fornecedor')


@section('content')
    {{ Form::model($fornecedor, ['route' => ['fornecedores.update', 'fornecedor_id' => $fornecedor->id], 'method' => 'PUT']) }}
    @include('fornecedores.form')
    {{ Form::close() }}
@endsection
