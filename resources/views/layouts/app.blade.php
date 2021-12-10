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
    <div id="app">
        <header>
            @include('layouts.components.nav')
            <h1>@yield('title')</h1>
        </header>
        <main>
            <div class="container">
                <div class="container-row">
                    @if (session('message'))
                        <div class="msg msg-info">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/index.js') }}"></script>
    @method('scripts')
</body>

</html>
