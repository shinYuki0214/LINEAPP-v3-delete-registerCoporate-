<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="form-signin-area">
        <main class="form-signin">
            <a href="{{ route('linelogin') }}" class="w-100 btn btn-lg btn-success" type="submit">LINEでログイン</a>
            <p class="mt-5 mb-3 text-muted">&copy; 2023iwata</p>
        </main>
    </div>

</body>

</html>
