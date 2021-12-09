<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ $_ENV['APP_NAME'] }}</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @stack("styles")
</head>

<body>
    <header>
        @include('layouts.components.nav')

    </header>
    <main>
        @yield('content')
    </main>
    @method('scripts')
</body>

</html>
