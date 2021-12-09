@extends('layouts.app')

@section('title', 'Nova Marca')


@section('content')
    {{ Form::open(['route' => 'marcas.store', 'method' => 'POST']) }}
    @include('marcas.form')
    {{ Form::close() }}
@endsection
