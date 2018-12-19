<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Segura') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.growl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/segura.css') }}" rel="stylesheet">
    <style>
        span.status {
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        span.status.status-green, span.status.status-wel {
            background-color: green;
        }

        span.status.status-red, span.status.status-niet {
            background-color: red;
        }

        span.status.status-onzeker {
            background-color: orange;
        }
        span.status.status-onbekend {
            background-color: royalblue;
        }

        div.info {
            display: none;
        }

        div.info.active {
            display: block;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    @guest
                        {{ config('app.name', 'Laravel') }}
                    @else
                        Welkom, {{ Auth::user()->firstname }}
                    @endguest
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Uitloggen</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('performances.index')}}">Optredens</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('rehearsals.index')}}">Repetities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('home')}}">Fotos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('members.index')}}">Leden</a>
                            </li>
                            @management
                                <li class="nav-item">
                                    <a class="nav-link" href="{{Route('home')}}">Opkomst</a>
                                </li>
                            @endmanagement
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer ></script>
    <script src="{{ asset('js/jquery.growl.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('success'))
            $.growl.notice({
                title: "Succes!",
                message: "{{Session::get('success')}}"
            });
        @endif

        @if(Session::has('error'))
            $.growl.error({
                title: "Oeps!",
                message: "{{Session::get('error')}}"
            });
        @endif

        @if(Session::has('warning'))
            $.growl.warning({
                title: "Opgelet!",
                message: "{{Session::get('warning')}}"
            });
        @endif
    </script>
    @yield('footerscripts')
</body>
</html>
