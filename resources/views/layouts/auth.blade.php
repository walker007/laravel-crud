<!DOCTYPE html>
<html lang="en">

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
        <h1>{{ $_ENV['APP_NAME'] }}</h1>
        <h2>@yield('title-page')</h2>
    </header>
    <main>
        @yield('content')
    </main>
    @method('scripts')
</body>

</html>
