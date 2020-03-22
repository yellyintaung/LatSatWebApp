<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Latsat</title>
     <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Data Table CSS --}}
    <link rel="stylesheet" href="/dist/css/dataTables.bootstrap4.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> --}}

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse btn-add">
    

    <div class="wrapper">
        <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white btn-add">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white push" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
  
        </li>
        </ul>

    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        {{-- @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest --}}
        </ul>
    </nav>
    @include('la.layouts.sidebar')
    <div class="content-wrapper"><br>
        {{-- @include('la.layouts.contentheader') --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                      <!-- Default box -->
                      <div class="card card-outline card-primary">
                        @yield('card_header')
                        <div class="card-body table-responsive p-0">
                          @yield('content')
                        </div>
                        
                            @yield('card_footer')
                            
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
            </div>
        </section>
    </div>
    </div>
    <footer class="main-footer btn-add">
        <div class="text-center text-white">
        <strong>Copyright &copy; 2015-2020 All rights reserved.
        </div>
      </footer>
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>


    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    {{-- Data Table --}}
    <script src="/dist/js/jquery.dataTables.js"></script>
    <script src="/dist/js/dataTables.bootstrap4.js"></script>
    {{-- <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script> --}}
    {{-- <script src="{{asset('js/jquery.dform-1.1.0.js')}}"></script> --}}
    @stack('scripts')
</body>
</html>