@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="card-login">
        {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="input-login">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" class="input-login">
        <div class="card-row">

            <button class="btn btn-primary" type="submit">Acessar</button>
            <a href="">Esqueceu sua senha?</a>
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
    </div>
@endsection
