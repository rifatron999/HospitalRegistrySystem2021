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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">{{-- datatables --}}

</head>

<body>
    <div id="app">
        @if(date('Y-m-d') < Config::get('helpers.trial'))
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ route('admin.login') }}">
                            {{ config('app.name', 'Hospital Registry System') }} {{ ucfirst(config('multiauth.prefix')) }}
                        </a>
                        <!-- Collapsed Hamburger -->
                        <!-- <button type="button" class="btn btn-light btn-sm" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            Navbar
                        </button> -->
                    </div>

                    <div class="navbar-collapse  " id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav ">
                            <!-- Authentication Links -->
                            @guest
                            <!-- <li><a href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix')) }} Login</a></li> -->
                            @else
                            <li class="dropdown ">
                                <a href="#" class=" " data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} 
                                    </a>

                                <ul class="dropdown-menu-s border bg-dark ">
                                    <li class="d-flex justify-content-around">
                                        @admin('super')
                                        <a class="col-sm-1 text-white" href="{{ route('admin.show') }}">{{ ucfirst(config('multiauth.prefix')) }}</a>
                                        <a class="col-sm-1 text-white" href="{{ route('admin.roles') }}">Roles</a> 
                                        @endadmin
                                        @admin('system_user')
                                        <a class="col-sm-1 text-white" href="{{ route('admin.hospital') }}">Hospital</a> 
                                        <a class="col-sm-1 text-white" href="{{ route('admin.treatment') }}">Treament</a> 
                                        <a class="col-sm-1 text-white" href="{{ route('admin.disease') }}">Disease</a> 
                                        @endadmin()
                                        @admin('hospital_agent','doctor')
                                        <a class="col-sm-1 text-white" href="{{ route('admin.patient') }}">Patient</a> 
                                        <!-- <a class="col-sm-1" href="{{ route('admin.roles') }}">Refer</a>  -->
                                        @endadmin
                                        @admin('doctor')
                                        <a class="col-sm-1 text-white" href="{{ route('admin.prescription') }}">Prescription</a> 
                                        @endadmin
                                        <br>
                                        <a class="col-sm-1 text-white" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
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
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $err)
                            ⚠️{{$err}} <br>
                        @endforeach</strong></marquee></p> 
                    </div>
                @endif
            </div>
                @yield('content')
         @else
            <span class="navbar-brand" style="margin:auto; display:table; border:1px solid red;">
                Session Ended <br>
               
                https://github.com/rifatron999
            </span>
        @endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- datatables --}} 
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.datatable').DataTable();
        }); 
    </script>
    {{-- datatables --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    
</body>


</html>

