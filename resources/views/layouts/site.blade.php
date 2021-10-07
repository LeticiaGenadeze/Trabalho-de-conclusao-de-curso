<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O Meu Chá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="shortcut icon" href="{{ asset('themes/admin/images/favicon.svg') }}" type="image/x-icon">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div class="container-fluid site-topo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="">
                        <img class="logo-site" src="{{ asset('themes/admin/images/logo/logo.png') }}" alt="Logo" srcset="">
                    </a>
                </div>
                <div class="col-md-6">
                    <ul class="nav justify-content-end py-3">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <!--<a href="{{ url('/dashboard') }}" class="nav-link">Painel</a>-->
                            <a class="nav-link nav-link-login" href="{{ route('login') }}">LOGIN</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link nav-link-login" href="{{ route('login') }}">LOGIN</a>
                        </li>
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="site-content">
        <div class="perguntas">
            @yield('content')
        </div>
    </div>

    <footer class="bg-footer">
        <div class="text-center py-3">
            <p class="text-grey">2021 &copy; O Meu Chá</p>
        </div>
    </footer>
    @include('cookie-consent::index')

</body>

</html>