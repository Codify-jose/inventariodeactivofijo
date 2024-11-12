<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .navbar {
            background-color: #007bff;
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 24px;
            margin-right: 20px;
        }

        .nav-link {
            color: #ffffff;
            font-size: 16px;
            margin-right: 15px;
            transition: color 0.3s;
        }

        .nav-link:hover, .nav-link:focus {
            color: #adb5bd;
        }

        .nav-item.active .nav-link {
            color: #ffc107;
        }

        .dropdown-menu {
            background-color: #495057;
        }

        .dropdown-item {
            color: #ffffff;
            font-size: 14px;
            transition: background-color 0.3s, color 0.3s;
        }

        .dropdown-item:hover {
            background-color: #6c757d;
            color: #ffffff;
        }

        .user-menu {
            display: flex;
            align-items: center;
            color: #ffffff;
            font-size: 16px;
        }

        .user-menu i {
            margin-right: 5px;
        }

        /* Toggle button styles */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28155,155,155%2C 0.55%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">SIAF</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- Inicio -->
                            <li class="nav-item active">
                                <a class="nav-link" href="/"><i class="bi bi-house"></i> Inicio</a>
                            </li>

                            <!-- Activos -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownActivos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-box"></i> Activos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownActivos">
                                    <li><a class="dropdown-item" href="/activos/create"><i class="bi bi-plus-square"></i> Crear</a></li>
                                    <li><a class="dropdown-item" href="/activos/show"><i class="bi bi-eye"></i> Mostrar</a></li>
                                </ul>
                            </li>

                            <!-- Categorías de Activos -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategorias" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-layers"></i> Categorías de activos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategorias">
                                    <li><a class="dropdown-item" href="/categorias_activos/create"><i class="bi bi-plus-square"></i> Crear</a></li>
                                    <li><a class="dropdown-item" href="/categorias_activos/show"><i class="bi bi-eye"></i> Mostrar</a></li>
                                </ul>
                            </li>

                            <!-- Más opciones -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMasOpciones" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i> Más opciones
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMasOpciones">
                                    <li><a class="dropdown-item" href="/historial_movimiento/show"><i class="bi bi-clock-history"></i> Historial de movimientos</a></li>
                                    <li><a class="dropdown-item" href="/ubicaciones/show"><i class="bi bi-geo-alt"></i> Ubicaciones</a></li>
                                    <li><a class="dropdown-item" href="/mantenimiento/show"><i class="bi bi-tools"></i> Mantenimientos</a></li>
                                    <li><a class="dropdown-item" href="/usuarios/show"><i class="bi bi-people"></i> Usuarios</a></li>
                                </ul>
                            </li>

                            <!-- User Menu -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownUser" class="nav-link dropdown-toggle user-menu" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUser">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right"></i> {{ __('Cerrar sesion') }}
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container-fluid">
            @yield('content')
        </main>
    </div>
</body>
</html>

@yield('scripts')


