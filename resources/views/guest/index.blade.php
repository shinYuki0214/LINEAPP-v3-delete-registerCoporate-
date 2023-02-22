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
        <form>
          <img class="mb-4" src="" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">ログイン</h1>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">ログイン</button>
        </form>
        <a href="{{ route('linelogin') }}" class="w-100 btn btn-lg btn-success" type="submit">LINEでログイン</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2023iwata</p>
      </main>
  </div>
    
</body>
</html>