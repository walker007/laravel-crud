@extends('layouts.auth')

@section('title', 'Cadastre-se')

@section('content')
    <div class="card-login">
        {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        {{ Form::label('name', 'Nome*') }}
        {{ Form::text('name', null, ['class' => 'input-login', 'minlength' => '4', 'required']) }}
        @error('email')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        {{ Form::label('email', 'Email*') }}
        {{ Form::email('email', null, ['class' => 'input-login', 'required']) }}

        @error('password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        {{ Form::label('password', 'Senha*') }}
        {{ Form::password('password', ['class' => 'input-login', 'required', 'minlength' => '8']) }}


        {{ Form::label('password_confirmation', 'Confirme sua Senha*') }}
        {{ Form::password('password_confirmation', ['class' => 'input-login', 'required', 'minlength' => '8']) }}

        <div class="card-row">

            <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>

        </div>
        {!! Form::close() !!}
        <span class="card-divider">
            - ou -
        </span>
        <div class="card-row">

            <a class="btn btn-block btn-darkpurple " href="{{ route('login') }}">
                Faça login
            </a>

        </div>
    </div>
@endsection
