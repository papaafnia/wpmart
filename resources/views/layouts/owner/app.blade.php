<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WPMart | Warung Pekerja</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Varela+Round&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('owl.carousel/assets/owl.carousel.min.css')}}">
    
    <meta name="description" content="Warung Pekerja">
    <meta name="keywords" content="wpmart, warung, warung pekerja, shopping, warung online, paket dagang">
    <meta name="dcterms.type" content="Service">
    <meta name="dcterms.language" content="id">
    <meta property="og:url" content="https://www.itkawai.com/e-learning">
    <meta property="og:title" content="Bisnis dagang dengan paket produk WP Mart">
    <meta property="og:image" content="{{ asset ('file/images/logo/logo.jpeg')}}">
    <meta property="og:site_name" content="WP Mart | Cikarang">
    <meta property="og:type" content="website">

    <!-- HP BROWSER -->
  <!-- Untuk Chrome & Opera -->
  <meta name="theme-color" content="#E70012"/>
  <!-- Untuk Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#E70012"/>
  <!-- Untuk Safari iOS -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#E70012"/>

  <link rel="canonical" href="https://www.itkawai.com/e-learning/">

  <!-- Favicons -->
  <link href=" {{ asset ('file/images/logo/logo.jpeg') }}" rel="icon">
  {{-- <link href=" {{ asset ('arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

  <!-- SweetAlert -->
  <link rel="stylesheet" href="{{ asset ('sweetalert2/dist/sweetalert2.min.css') }}">
    
  <link href="{{ asset ('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

  <style>
    
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 250px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content a:hover {background-color: #ddd;}
    
    .dropdown:hover .dropdown-content {display: block;}
    </style>
  </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container">
                @guest
                <a class="navbar-brand" href="/">
                    <img src="{{ url ('file/images/logo/warung-pekerja.png') }}" alt="" width="188px" height="34px">
                </a>
                @else
                <a class="navbar-brand" href="{{route ('home.index')}}">
                    <img src="{{ url ('file/images/logo/warung-pekerja.png') }}" alt="" width="188px" height="34px">
                </a>
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('catalog.index')}}">
                                Catalog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.index')}}">
                                <i class="fa fa-shopping-cart"></i>
                                </a>
                            </li>
                            <div class="dropdown nav-link">
                                <img src="{{ url('file/images/avatar', Auth::user()->image)}}" alt="" style="width:25px; border-radius:50%" > {{ Auth::user()->name }}
                                <div class="dropdown-content">
                                <a href="{{ route('menunggu-konfirmasi.index')}}">Status Pemesanan</a>
                                <a href="{{ route('riwayat-pemesanan.index')}}">Riwayat Pemesanan</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </div>
                            </div>

                            

                            

                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    
    {{-- <footer class="navbar navbar-expand-md navbar-light navbar-laravel fixed-bottom">
        <div class="credits">
            Design And Development by ITKawai All rights reserved © 2019 - @php echo date('Y')@endphp
        </div>
    </footer> --}}



<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/jquery.min.js') }}" ></script>
<script src="{{ asset('sweetalert2/dist/jquery-v1.7.1.min.js') }}" ></script>

<!-- Sweetalert2 -->
<script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}" ></script>

<!-- font awesome-->
<script src="https://kit.fontawesome.com/d224024b56.js" crossorigin="anonymous"></script>

<script src="{{asset ('owl.carousel/owl.carousel.min.js')}}"></script>

</body>
</html>
