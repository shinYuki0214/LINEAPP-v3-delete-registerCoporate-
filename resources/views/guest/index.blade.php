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
    @guest
    <div class="form-signin-area">
        <main class="form-signin">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img class="mb-4" src="" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">ログイン</h1>
                <div class="form-floating">
                    <input id="floatingInput" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">

                    <input id="floatingPassword" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-primary mb-3" type="submit">ログイン</button>
            </form>
            <p class="mt-5 mb-3 text-muted">&copy; 2023iwata</p>
        </main>
    </div>
    @endguest
</body>

</html>
