<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('meta_title')</title>
    <meta name="description" content="@yield('meta_desc')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('assets/layouts/_layout/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('assets/layouts/_layout/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{asset('assets/layouts/_layout/css/fontastic.css')}}">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{asset('assets/layouts/_layout/vendor/@fancyapps/fancybox/jquery.fancybox.min.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('assets/layouts/_layout/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('assets/layouts/_layout/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<header class="header">
    <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
                <!-- Navbar Brand --><a href="{{route('home')}}" class="navbar-brand">Larablog</a>

                <!-- Toggle Button-->
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{url('/')}}" class="nav-link active ">Home</a>
                    </li>
                    <li class="nav-item"><a href="{{url('larablog/blog')}}" class="nav-link ">Blog</a>
                    </li>
                    <li class="nav-item"><a href="{{url('larablog/post')}}" class="nav-link ">Post</a>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link ">Contact</a>
                    </li>

                    @if(Auth::check())

                        @if(auth()->user())
                            <li class="nav-item"><a class="nav-link" href="{{url('/admin')}}"style="color: blue">Welcome : {{Auth::user()->name}}</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{url('/logout')}}"style="color: blue">Welcome : {{Auth::user()->name}}</a></li>
                        @endif
                    @else
                        <li class="nav-item"> <a class="nav-link" href="{{route('login')}}">Login</a></li>
                    @endif
                </ul>
                <ul class="langs navbar-text"><a href="#" class="active">EN</a>
                    <span>         </span><a href="#">AR</a></ul>

            </div>
        </div>
    </nav>
</header>
<!-- Hero Section-->
    @yield('content')

<!-- Intro Section-->



<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <h6 class="text-white">Bootstrap Blog</h6>

                </div>
                <div class="contact-details">
                    <p>53 Broadway, Broklyn, NY 11249</p>
                    <p>Phone: (020) 123 456 789</p>
                    <p>Email: <a href="mailto:info@company.com">Info@Company.com</a></p>
                    <ul class="social-menu">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menus d-flex">
                    <ul class="list-unstyled">
                        <li> <a href="#">My Account</a></li>
                        <li> <a href="#">Add Listing</a></li>
                        <li> <a href="#">Pricing</a></li>
                        <li> <a href="#">Privacy &amp; Policy</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li> <a href="#">Our Partners</a></li>
                        <li> <a href="#">FAQ</a></li>
                        <li> <a href="#">How It Works</a></li>
                        <li> <a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="latest-posts"><a href="#">
                        <div class="post d-flex align-items-center">
                            <div class="image"><img src="{{asset('../assets/layouts/_layout/img/small-thumbnail-1.jpg')}}" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Hotels for all budgets</strong><span class="date last-meta">October 26, 2016</span></div>
                        </div></a><a href="#">
                        <div class="post d-flex align-items-center">
                            <div class="image"><img src="{{asset('../assets/layouts/_layout/img/small-thumbnail-2.jpg')}}" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Great street atrs in London</strong><span class="date last-meta">October 26, 2016</span></div>
                        </div></a><a href="#">
                        <div class="post d-flex align-items-center">
                            <div class="image"><img src="{{asset('../assets/layouts/_layout/img/small-thumbnail-3.jpg')}}" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Best coffee shops in Sydney</strong><span class="date last-meta">October 26, 2016</span></div>
                        </div></a></div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2017. All rights reserved. Your great site.</p>
                </div>
                <div class="col-md-6 text-right">
                    <p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">Bootstrapious</a>
                        <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Page Footer-->
<!-- JavaScript files-->
@include('sweetalert::alert')
<script src="{{asset('assets/layouts/_layout/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/layouts/_layout/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('assets/layouts/_layout/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/layouts/_layout/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('assets/layouts/_layout/vendor/@fancyapps/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/layouts/_layout/js/front.js')}}"></script>
</body>
</html>
