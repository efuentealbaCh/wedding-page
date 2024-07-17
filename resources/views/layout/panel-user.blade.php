<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <title>Regalos E y K</title>
</head>

<body>
    <div class="loader"></div>
    <div class="app">
        @if (Session::has('admin'))
            <div class="main-wrapper main-wrapper-1">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar sticky">
                    <div class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li>
                                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
                                        data-feather="align-justify"></i></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link nav-link-lg fullscreen-btn"><i
                                        data-feather="maximize"></i></a>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <figure class="avatar mr-2"
                                    data-initial="
                                @if (Session::has('admin')) {{ Str::upper(Session::get('admin.usua_nombre')[0]) . Str::upper(Session::get('admin.usua_apellido')[0]) }}
                                @elseif (Session::has('digitador'))
                                    {{ Str::upper(Session::get('digitador.usua_nombre')[0]) . Str::upper(Session::get('digitador.usua_apellido')[0]) }} @endif
                            ">
                                </figure>
                                <span class="d-sm-none d-lg-inline-block"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pullDown">
                                <div class="dropdown-title">
                                    @if (Session::has('admin'))
                                        Hola {{ Session::get('admin.usua_nombre') }}
                                    @endif
                                </div>
                        </li>
                    </ul>
                </nav>
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand theme-cyan">
                            <a href="javascript:void(0)"> <img alt="image"
                                    src="{{ asset('public/img/camanchaca.png') }}" class="header-logo" />
                                <span class="logo-name">SISREL</span>
                            </a>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Observador</li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i
                                        data-feather="monitor"></i><span>Dashboard</span></a>
                                <ul class="dropdown-menu">
                                    {{-- <li><a class="nav-link" href="{{ route('observador.dbgeneral.index') }}">General</a></li>
                                    <li><a class="nav-link" href="{{ route('observador.index.iniciativas') }}">Por iniciativas</a></li>
                                    <li><a class="nav-link" href="{{ route('observador.index.actividades') }}">Por actividades</a></li>
                                    <li><a class="nav-link" href="{{ route('observador.index.donaciones') }}">Por donaciones</a></li> --}}
                                </ul>
                            </li>
                            {{-- <li class="{{ Route::is('observador.map') ? 'dropdown active' : 'dropdown' }}">
                            <a class="nav-link" href="{{route('observador.map')}}"><i data-feather="map"></i><span>Mapa</span></a></li>
                        </li> --}}
                            <!-- Botón de Logout -->
                            <li class="menu-header">Cuenta</li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i> <span>Cerrar Sesión</span>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        @endif

        @if (Route::is('index.login.view') || Route::is('auth.register'))
            @yield('content')
        @else
            <div class="main-content">
                @yield('content')
            </div>
        @endif
    </div>
</body>

<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/auth/login.js') }}"></script>
<script src="{{ asset('js/utils/sweetalert/sweetalert.min.js') }}"></script>
@yield('js-add')

</html>
