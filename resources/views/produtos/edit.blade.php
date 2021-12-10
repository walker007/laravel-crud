@extends('layouts.app')

@section('title', 'Editar Produto')


@section('content')
    {{ Form::model($produto, ['route' => ['produtos.update', $produto->id], 'method' => 'PUT']) }}
    @include('produtos.form')
    {{ Form::close() }}
@endsection
