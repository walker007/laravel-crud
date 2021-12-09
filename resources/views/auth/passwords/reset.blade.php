@extends('layouts.auth')

@section('title', 'Recupere sua Senha')

@section('content')
    <div class="card-login">
        {!! Form::open(['route' => 'password.update', 'method' => 'POST']) !!}
        {!! Form::hidden('token', $token) !!}
        @error('email')
            <div class="invalid-feedback">
                <strong>{{ __($message) }}</strong>
            </div>
        @enderror

        {{ Form::label('email', 'Email*') }}
        {{ Form::email('email', $email ?? old('email'), ['class' => 'input-login', 'required']) }}
        @error('password')
            <div class="invalid-feedback">
                <strong>{{ __($message) }}</strong>
            </div>
        @enderror
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

            <button class="btn btn-primary btn-block" type="submit">Alterar a senha</button>

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
