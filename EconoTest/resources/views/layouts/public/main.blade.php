<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
    <head>
        <title>ECONOTEST</title>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">

        <!-- ICONO -->
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- FONTS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic%7CLato:300,300italic,400,400italic,700,900%7CMerriweather:700italic">

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('/css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/mejora.css') }}">
        @yield('styles-users')

    </head>
    
    <body  class="d-flex flex-column" >
        <!-- NAVBAR -->
        <header class="page-head">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-group">
                            <div class="rd-navbar-panel">
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button><a class="rd-navbar-brand brand" href="#"><img src="{{ asset('images/econotest-logo.png') }}" alt="" width="143" height="27"/></a>
                            </div>
                            <div class="rd-navbar-nav-wrap">
                                <div class="rd-navbar-nav-inner">
                                    @if (Auth::check())
                                        <ul class="rd-navbar-nav">
                                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Inicio</a>
                                            </li>
                                            <li class="{{ Request::is('albunes') ? 'active' : '' }}"><a href="/albunes">Álbumes</a>
                                            </li>
                                            {{-- <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="/home">Quiz</a>
                                            </li> --}}
                                            <li class="{{ Request::is('coleccion') ? 'active' : '' }}" ><a href="/coleccion">Mi Colección</a>
                                            </li>
                                            <li class="{{ Request::is('perfil') ? 'active' : '' }}" ><a href="/perfil">Perfil</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    <img src="{{ asset('images/logout.png') }}" width="27" height="27">
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                            @else
                                                <div class="rd-navbar-btn-wrap">
                                                    <a class="button button-smaller button-primary-outline" href="register">REGISTRARSE</a>
                                                </div>
                                                <ul class="rd-navbar-nav">
                                                    <li class="active"><a href="#inicio">Inicio</a>
                                                    </li>
                                                    <li><a href="#info">Sobre Econotest</a>
                                                    </li>
                                                    <li><a href="#pasos">Pasos</a>
                                                    </li>
                                                    <li><a href="/login">Iniciar Sesión</a>
                                                    </li>
                                                </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- FIN NAVBAR -->

        <!-- CONTENIDO -->
        <main class="contenido">
            @yield('contenido')
        </main>
        <!-- FIN CONTENIDO -->
        
        <!-- FOOTER -->
        <footer id="footer-log">
            <div class="copyright-text">
              <p class="rights text-white"><span class="copyright-year"></span><span>&nbsp;&#169;&nbsp;</span><span>ECONOTEST.&nbsp; Todos los Derechos Reservados.</p>
              <ul class="social-icon">
                <li><a href="#" class="fab fa-facebook-square"></a></li>
                <li><a href="#" class="fab fa-twitter"></a></li>
                <li><a href="#" class="fab fa-instagram"></a></li>
              </ul>
            </div>
          @yield('footer')
      </footer>
      <!-- FIN FOOTER -->
        <script src="{{ asset('/js/core.min.js') }}"></script>
        <script src="{{ asset('/js/script.js') }}"></script>
        @yield('scripts-users')
    </body>
</html>
