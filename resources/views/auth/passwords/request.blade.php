@extends('layouts.auth')

@section('title', 'Recupere sua Senha')

@section('content')
    <div class="card-login">
        {!! Form::open(['route' => 'password.email', 'method' => 'POST']) !!}
        @error('email')
            <div class="invalid-feedback">
                <strong>{{ __($message) }}</strong>
            </div>
        @enderror
        {{ Form::label('email', 'Email*') }}
        {{ Form::email('email', null, ['class' => 'input-login', 'required']) }}

        <div class="card-row">

            <button class="btn btn-primary btn-block" type="submit">Solicitar alteração de senha</button>

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
        @if (session('status'))
            <div class="message msg-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
@endsection
