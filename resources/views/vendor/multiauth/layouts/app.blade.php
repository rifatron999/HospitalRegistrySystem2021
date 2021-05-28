<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hospital Registry System 2021') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('admin.login') }}">
                        {{ config('app.name', 'Hospital Registry System') }} {{ ucfirst(config('multiauth.prefix')) }}
                    </a>
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="btn btn-light btn-sm" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        Navbar
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <li><a href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix')) }} Login</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <ul class="dropdown-menu-s border ">
                                <li class="d-flex justify-content-around">
                                    @admin('super')
                                    <a class="col-sm-1" href="{{ route('admin.show') }}">{{ ucfirst(config('multiauth.prefix')) }}</a>
                                    <a class="col-sm-1" href="{{ route('admin.roles') }}">Roles</a> 
                                    @endadmin
                                    @admin('system_user')
                                    <a class="col-sm-1" href="{{ route('admin.roles') }}">Hospital</a> 
                                    <a class="col-sm-1" href="{{ route('admin.roles') }}">Treament</a> 
                                    <a class="col-sm-1" href="{{ route('admin.roles') }}">Disease</a> 
                                    @endadmin()
                                    @admin('hospital_agent','doctor')
                                    <a class="col-sm-1" href="{{ route('admin.roles') }}">Patient</a> 
                                    @endadmin
                                    @admin('doctor')
                                    <a class="col-sm-1" href="{{ route('admin.roles') }}">Prescription</a> 
                                    @endadmin
                                    <a class="col-sm-1" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>