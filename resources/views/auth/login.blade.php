@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="card-login">
        {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
        @error('email')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, ['class' => 'input-login']) }}
        @error('password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        {{ Form::label('password', 'Senha') }}
        {{ Form::password('password', ['class' => 'input-login']) }}
        <div class="card-row">

            <button class="btn btn-primary" type="submit">Acessar</button>
            <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
        </div>
        {!! Form::close() !!}
        <span class="card-divider">
            - ou -
        </span>
        <div class="card-row">

            <a class="btn btn-block btn-darkpurple " href="{{ route('register') }}">
                Crie Uma Conta
            </a>

        </div>
        @if (session('status'))
            <div class="message msg-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
@endsection
