@extends('layouts.app')

@section('title', 'Verifique seu Email')

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            <p>Um novo link de Verificação foi enviado para seu email</p>
        </div>
    @endif
    <p>Antes de continuar, verifique seu email.</p>
    <p>Se você não recebeu nenhum email</p>
    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
        @csrf

        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
            Clique aqui e solicite outro
        </button>.
    </form>
@endsection
