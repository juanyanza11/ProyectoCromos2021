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

  </head>
  <body>
    
      <!-- NAVBAR -->
      <header class="page-head">
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner">
              <div class="rd-navbar-group">
                <div class="rd-navbar-panel">
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button><a class="rd-navbar-brand brand" href="index.html"><img src="{{ asset('images/econotest-logo.png') }}" alt="" width="143" height="27"/></a>
                </div>
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-nav-inner">
                    <div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="#">REGISTRARSE</a></div>
                    <ul class="rd-navbar-nav">
                      <li class="active"><a href="#quiz">Quiz</a>
                      </li>
                      <li><a href="#">Mi Perfil</a>
                      </li>
                      <li><a href="#">Perfil</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- FIN NAVBAR -->

       <!-- BENEFICIOS -->
       <section id="beneficios" class="section-50 section-md-75 section-lg-100">
        <div class="container">
        <h3>BENEFICIOS</h3>
          <div class="row row-40">
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                <div class="box-icon"><img src="images/beneficios1.jfif" alt="" width="300" height="300"/></div>
                  <div class="box-header">
                    <h5><a href="#"></a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>Obten diversas recompensan en forma de cromos.</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><img src="images/beneficios2.jfif" alt="" width="300" height="300"/></div>
                  <div class="box-header">
                    <h5><a href="#"></a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>Mide tus conocimientos sobre temáticas centrales de la economía</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                <div class="box-icon"><img src="images/beneficios3.jfif" alt="" width="300" height="300"/></div>
                  <div class="box-header">
                    <h5><a href="#"></a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="box-body">
                  <p>Aprendizaje interactivo</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- FIN BENEFICIOS -->

      <!-- FOOTER -->
      <footer id="footer">
          <div class="container">

            <div class="copyright-text">
              <p class="rights text-white"><span class="copyright-year"></span><span>&nbsp;&#169;&nbsp;</span><span>ECONOTEST.&nbsp; Todos los Derechos Reservados.</p>
              <ul class="social-icon">
                <li><a href="#" class="fab fa-facebook-square"></a></li>
                <li><a href="#" class="fab fa-twitter"></a></li>
                <li><a href="#" class="fab fa-instagram"></a></li>
              </ul>
            </div>

          </div>
      </footer>
      <!-- FIN FOOTER -->

    </div>
    <script src="{{ asset('/js/core.min.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
  </body>
</html>