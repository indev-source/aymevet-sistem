<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="https://image.flaticon.com/icons/svg/1069/1069102.svg"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/paper-dashboard.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
        
        <style>
            ul.nav>li.active > a{
                color:#243882 !important;
            }
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
            }
        </style>
        @yield('css')
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="danger">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="{{asset('/')}}" class="simple-text">
                        <img style=" height: 80px; width: 80px;" src="{{asset('logo.jpeg')}}" alt="..."/> <br>
                        AYMEVET
                        </a>
                    </div>
                    @include('shared.nav')
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="{{asset('/sincronizacion')}}">
                                        <i class="fa fa-refresh"></i>
                                        <p>Sincronización</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset('vender')}}">
                                        <i class="ti-shopping-cart"></i>
                                        <p>Vender</p>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class=" ti-user"></i>
                                        <p>{{Auth::user()->name}}</p>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="">
                                            <i class="ti-home"></i>{{Auth::user()->bussine->nombre}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                            <i class=" ti-lock"></i> {{strtoupper(Auth::user()->rol)}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{asset('perfil?empleado='.Auth::user()->id)}}">
                                            <i class="ti-files"></i> Perfil
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class=" ti-lock"></i>
                                        <p>Salir</p>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                            </ul>
                        </nav>
                        <div class="copyright pull-right">
                            &copy; <script>document.write(new Date().getFullYear())</script>, Inusual Admin V1.0
                            <img src="{{asset('svg/alien.jpg')}}" width="20" height="20" alt=""> Por <a target="_blanck" href="http://inusualsoft.com/">Inusual Software</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('shared.products')
        @include('reportes.modales.inventario')
        @include('reportes.modales.ventas')
        @include('reportes.modales.ventas-fecha')
    </body>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{asset('assets/js/bootstrap-checkbox-radio.js')}}"></script>
    <!--  Charts Plugin -->
    <script src="{{asset('assets/js/chartist.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{asset('assets/js/paper-dashboard.js')}}"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('assets/js/demo.js')}}"></script>
    <script src="{{asset('js/data-table.js')}}"></script>
    <script src="{{asset('js/data-boot.js')}}"></script>
    <script src="{{asset('js/init-table.js')}}"></script>
    <script
        src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
    <script
        src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.flash.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script
        src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script
        src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    @yield('js')
</html>

