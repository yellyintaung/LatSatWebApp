<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latsat</title>
    
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Padauk:wght@700&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    
    @stack('css')
</head>
<body>
    {{-- <header> 
        <div class="py-1 btn-add text-center">
            <div class="container py-1" style="font-size: 13px;">
                <div class="d-inline-block pt-1">
                    <a href="mailto:latsatfood@gmail.com" class="text-white" style="text-decoration:none;"><i class="fas fa-envelope"></i><span> &nbsp;latsatfood@gmail.com |</span></a> 
                    <a href="tel:09 693335053" class="text-white" style="text-decoration:none;">  <i class="fas fa-phone-volume"></i><span> &nbsp;09 693335053 |</span></a>
                    <a href="tel:09 796569259" class="text-white" style="text-decoration:none;">  <i class="fas fa-phone-volume"></i><span> &nbsp;09 796569259</span></a>
                </div>
            </div>
        </div>
    </header> --}}
    <div class="sticky-top">
        <nav class="navbar navbar-expand-sm shadow bg-light">
            <div class="container">
                
                {{-- <button class="navbar-toggler navbar-light bg-light" type="button" data-toggle="collapse"
                data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <!-- Links -->
            <div class="navbar-collapse n-fs justify-content-center"  id="navbarText">
                <a class="mobilelogo" href="/" style="display: none;">
                    <img src="{{ asset('images/logo.png') }}" width="50px" alt="logo" class="logo">
                </a>
                <ul class="navbar-nav mobile-view">
                    <li class="nav-item latsat-nav-pd">
                        <a class="nav-link latsat-nav" href="/">Home</a>
                    </li>
                    <li class="nav-item latsat-nav-pd dropdown">
                        <a class="nav-link latsat-nav dropdown-toggle mobile-avaliable" href="#" id="navbardrop" data-toggle="dropdown">
                            Availiable Products
                        </a>
                        <!-- Dropdown -->
                        <div class="dropdown-menu latsat-dropdown">
                            @foreach ($menu_categories as $categories)
                            <a class="dropdown-item" href="/product/{{ $categories->id }}"> {{ $categories->category_name }} </a>
                            @endforeach
                        </div>
                    </li>
                    
                    
                    <!-- Brand -->
                    <a class="navbar-brand d-none d-sm-block" style="padding-bottom:0 ;" href="#">
                        <img src="{{ asset('images/logo.png') }}" width="75px" alt="logo" class="logo" />
                    </a>
                    
                    {{-- <li class="nav-item latsat-nav-pd">
                        <a class="nav-link latsat-nav" href="#">Contact</a>
                    </li> --}}
                    
                    <li class="nav-item latsat-nav-pd">
                        <a class="nav-link latsat-nav" href="/showShoppingCartview">
                            <img src="{{ asset('images/supermarket.png') }}" alt="shooping-cart"
                            width="24px" class="mb-img" /><span class="count lbcount">
                                <span id="show-count"></span>
                            </span>
                        </a>
                    </li>


                    <li class="nav-item latsat-nav-pd"> 
                        @if(Session::get('customer')<>null)
                        <a class="nav-link latsat-nav dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <span class="">{{str_limit(Session::get('customer'),4)}}</span>
                        </a>
                        <!-- Dropdown -->
                        <div class="dropdown-menu latsat-dropdown">
                            @if (Session::get('cp')->count() <> 0)
                            <a class="dropdown-item" href="/order_history">Order History</a>
                            @else
                            <a class="dropdown-item" href="/">Order History</a>
                            @endif
                            
                            
                           
                            <a class="dropdown-item" href="/user_logout"> Logout </a>
                        </div>
                         @else
          
                        <a class="nav-link latsat-nav mob-login" href="/useracc_check">
                            <img src="{{ asset('images/user.png') }}" 
                            width="24px" class="mb-img"/>&nbsp;
                            <span class="mb-lg">Login</span>
                        </a>
                        
                    
                    @endif
                </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
