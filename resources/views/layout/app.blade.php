<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- Aquí irá el título de cada página--}}
        <title>@yield('title')</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
    </head>
  <body>
        {{-- Menú --}}
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" arialabel="Toggle 
                navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                        </li>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              Activos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="/activos/create">Crear</a></li>
                              <li><a class="dropdown-item" href="/activos/update">Actualizar</a></li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/activos/show">Mostrar</a></li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              Categorias de activos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="/categorias_activos/create">Crear</a></li>
                              <li><a class="dropdown-item" href="/categorias_activos/update">Actualizar</a></li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/categorias_activos/show">Mostrar</a></li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              Mantenimiento
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="/mantenimiento/create">Crear</a></li>
                              <li><a class="dropdown-item" href="/mantenimiento/update">Actualizar</a></li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/mantenimiento/show">Mostrar </a></li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              Usuarios
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="/usuarios/create">Crear</a></li>
                              <li><a class="dropdown-item" href="/usuarios/update">Actualizar</a></li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/usuarios/show">Mostrar </a></li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              Historial de movimiento
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="/historial_movimiento/show">Mostrar </a></li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              Ubicaciones
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="/mantenimiento/create">Crear</a></li>
                              <li><a class="dropdown-item" href="/mantenimiento/update">Actualizar</a></li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="/mantenimiento/show">Mostrar </a></li>
                            </ul>
                          </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav> 
        <div class="container-fluid">
            {{-- Aquí irá el contenido de todas las páginas --}}
            @yield('content') 
        </div>      
        @yield('scripts')  
  </body>
</html>
@yield('scripts')