<!doctype html>
<html lang="ES">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icono  -->
    <link href="{{ asset('/img/favicon.png') }}" rel="icon" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Grupo Galaxia') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Icons -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/img/logo_elecciones_2023.png') }}" alt=""
                        style="width: 150px; height:auto; ">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (in_array(Auth::user()->fk_roles, [1, 2, 3]))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Inicio') }}</a>
                                </li>
                            @endif
                            @if (in_array(Auth::user()->fk_roles, [1, 2, 3]))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('factcountvote.create') }}">{{ __('Cuenta Votos') }}</a>
                                </li>
                            @endif
                            @if (in_array(Auth::user()->fk_roles, [1, 2, 3]))
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('E-14') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="nav-link" href="{{ route('format') }}">{{ __('Registrar E-14') }}</a>
                                        <a class="nav-link"
                                            href="{{ route('factvote.viewvotes') }}">{{ __('Imagen E-14') }}</a>
                                        @if (in_array(Auth::user()->fk_roles, [3]))
                                            <a class="nav-link"
                                                href="{{ route('dashboard.votes') }}">{{ __('Seguimiento E-14') }}</a>
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if (in_array(Auth::user()->fk_roles, [1, 2, 3]))
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Novedades') }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if (in_array(Auth::user()->fk_roles, [1, 3]))
                                            <a class="nav-link"
                                                href="{{ route('coordinators.news') }}">{{ __('Ver Novedades') }}</a>
                                        @endif
                                        <a class="nav-link"
                                            href="{{ route('factcountvote.news') }}">{{ __('Registrar Novedades') }}</a>
                                    </div>
                                </li>
                            @endif
                            @if (in_array(Auth::user()->fk_roles, [1, 3, 4]))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('monitor.dashboard') }}">{{ __('Monitor') }}</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @if (session('message') == 'Success')
        <script>
            swal.fire({
                title: "Buen Trabajo!",
                text: "Se guardó con éxito!",
                icon: "success",
                button: "Continuar",
            });
        </script>
    @endif
    @if (session('message') == 'Error')
        <script>
            swal.fire({
                title: "Error",
                text: "Algo salio mal! {{ session('Code') }}",
                icon: "error",
                button: "Continuar",
            });
        </script>
    @endif
    @if (session('messagefcv') == 'Success')
        <script>
            swal.fire({
                title: "Buen Trabajo!",
                text: "Se guardó con éxito!",
                icon: "success",
                button: "Continuar",
            });
        </script>
    @endif
    @if (session('messagefcv') == 'Error')
        <script>
            swal.fire({
                title: "Error",
                text: "Algo salio mal! {{ session('Codefcv') }}",
                icon: "error",
                button: "Continuar",
            });
        </script>
    @endif
</body>

</html>
