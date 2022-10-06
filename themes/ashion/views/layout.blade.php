<!-- layout of theme -->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        

        
        <meta charset="UTF-8">
        <meta name="description" content="Ashion Template">
        <meta name="keywords" content="Ashion, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel Ecommerce | @yield('title', '')</title>
    
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
            rel="stylesheet">
    
        <!-- Css Styles -->
        <link rel="stylesheet" href="{{ asset('themes/ashion/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('themes/ashion/css/font-awesome.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('themes/ashion/css/elegant-icons.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('themes/ashion/css/jquery-ui.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('themes/ashion/css/magnific-popup.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('themes/ashion/css/owl.carousel.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('themes/ashion/css/slicknav.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('themes/ashion/css/style.css') }}" type="text/css">

        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')"> 
    <!-- Header Section Begin -->
    @include('partials.header')
    <!-- Header Section End -->

    <!-- Content Section begin -->
    @yield('content')
    <!-- Content Section End -->

    <!-- Footer Section Begin -->
    @include('partials.footer')
    <!-- Footer Section End -->
    
    <!-- Search Begin -->
    @include('partials.search')
    <!-- Search End -->

    @yield('extra-js')

     <!-- Js Plugins -->
     <script src="{{ asset('themes/ashion/js/jquery-3.3.1.min.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/jquery.magnific-popup.min.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/jquery-ui.min.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/mixitup.min.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/jquery.countdown.min.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/jquery.slicknav.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/jquery.nicescroll.min.js') }}"></script>
     <script src="{{ asset('themes/ashion/js/main.js') }}"></script>
</body>
</html>
