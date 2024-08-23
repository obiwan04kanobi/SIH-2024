<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('SIH-2024', 'SIH-2024') }}</title>
    @vite('public/css/app.css')
</head>

<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
