@extends('layouts.app')

@section('title', 'Novo Fornecedor')


@section('content')
    {{ Form::open(['route' => 'fornecedores.store', 'method' => 'POST']) }}
    @include('fornecedores.form')
    {{ Form::close() }}
@endsection
