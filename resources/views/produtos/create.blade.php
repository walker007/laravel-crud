@extends('layouts.app')

@section('title', 'Novo Produto')


@section('content')
    {{ Form::open(['route' => 'produtos.store', 'method' => 'POST']) }}
    @include('produtos.form')
    {{ Form::close() }}
@endsection
