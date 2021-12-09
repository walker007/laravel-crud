@extends('layouts.app')

@section('title', 'Editar Marca')


@section('content')
    {{ Form::model($marca, ['route' => ['marcas.update', 'marca_id' => $marca->id], 'method' => 'PUT']) }}
    @include('marcas.form')
    {{ Form::close() }}
@endsection
