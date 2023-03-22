<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="top__wrapper">
        @cannot('is_top')
        <div class="top__inner">
            <a href="{{route('home')}}" class="top__btn-01">
                トップに戻る
            </a>
        </div>
        @endcannot
    </div>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        @can('manager-higher')
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('manager.index') }}">発注システム</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        @endcan
        {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                {{-- <a class="" href="#">Sign out</a> --}}
                <a class="nav-link px-3" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">

            @can('manager-higher')
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            @can('manager-higher')
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('manager.index') }}">
                                        <span data-feather="home"></span>
                                        お客様一覧
                                    </a>
                                </li>
                                @php
                                    $beforeDate = $Global_recived_date;
                                    $theDate = $Global_recived_date;
                                    $afterDate = $Global_recived_date;
                                @endphp
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('manager.order.index', $nextMonday) }}">
                                        <span data-feather="file"></span>
                                        月曜日の配達
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('manager.order.selectdate') }}">
                                        <span data-feather="file"></span>
                                        発注確認
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('product.index') }}">
                                        <span data-feather="file"></span>
                                        登録商品一覧
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('product.create') }}">
                                        <span data-feather="file"></span>
                                        商品登録
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('order.index') }}">
                                        <span data-feather="file"></span>
                                        発注状況
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('order.create') }}">
                                        <span data-feather="file"></span>
                                        発注
                                    </a>
                                </li>
                            @endcan
                        </ul>

                    </div>
                </nav>
                @else

            @endcan
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('sectiontitle')</h1>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
