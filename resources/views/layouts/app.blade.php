<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{asset('public_libraries/img/lookalikelogo.jpg')}}" type="image/jpg">
    <title>{{$pageTitle ?? 'default'}}</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('public_libraries/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('public_libraries/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('public_libraries/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('public_libraries/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public_libraries/vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{asset('public_libraries/vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('public_libraries/vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('public_libraries/vendors/jquery-ui/jquery-ui.css')}}">
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('public_libraries/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('public_libraries/css/responsive.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
                        @guest
                            <div class="container">
                                <h2 class="text-center">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                   Visite Store
                                 </a>
                                </h2>
                            </div>
                        @else
                        <div id="app">
                            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                                <div class="container">
                                    
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                    
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <!-- Left Side Of Navbar -->
                                        <ul class="navbar-nav mr-auto">
                    
                                        </ul>
                    
                                        <!-- Right Side Of Navbar -->
                                        <ul class="navbar-nav ml-auto">
                                            <!-- Authentication Links -->
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        @endguest
                    

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('public_libraries/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public_libraries/js/popper.js')}}"></script>
<script src="{{asset('public_libraries/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public_libraries/js/stellar.js')}}"></script>
<script src="{{asset('public_libraries/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('public_libraries/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
{{-- <script src="{{asset('public_libraries/vendors/flipclock/timer.js')}}"></script> --}}
<script src="{{asset('public_libraries/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('public_libraries/js/mail-script.js')}}"></script>
<script src="{{asset('public_libraries/js/theme.js')}}"></script>
<script src="{{asset('public_libraries/sweetalert/sweetalert.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
</body>
</html>
