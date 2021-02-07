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
        <link rel="stylesheet" href="<?php echo e(asset('/css/fonts.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/css/mejora.css')); ?>">

    </head>
    
    <body  class="d-flex flex-column" >
        <!-- NAVBAR -->
        <header class="page-head">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-group">
                            <div class="rd-navbar-panel">
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button><a class="rd-navbar-brand brand" href="#"><img src="<?php echo e(asset('images/econotest-logo.png')); ?>" alt="" width="143" height="27"/></a>
                            </div>
                            <div class="rd-navbar-nav-wrap">
                                <div class="rd-navbar-nav-inner">
                                    <?php if(Auth::check()): ?>
                                        <ul class="rd-navbar-nav">
                                            <li class="<?php echo e(Request::is('/') ? 'active' : ''); ?>"><a href="/">Inicio</a>
                                            </li>
                                            <li class="<?php echo e(Request::is('albunes') ? 'active' : ''); ?>"><a href="/albunes">Álbumes</a>
                                            </li>
                                            
                                            <li class="<?php echo e(Request::is('coleccion') ? 'active' : ''); ?>" ><a href="/coleccion">Mi Colección</a>
                                            </li>
                                            <li class="<?php echo e(Request::is('perfil') ? 'active' : ''); ?>" ><a href="/perfil">Perfil</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    <img src="<?php echo e(asset('images/logout.png')); ?>" width="27" height="27">
                                                </a>
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                    class="d-none">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            </li>
                                            <?php else: ?>
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
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- FIN NAVBAR -->

        <!-- INICIO -->
      <section id= contenido2>
        <section id=inicio>
          <div class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="false" data-autoplay="5500" data-simulate-touch="true">
          <div class="swiper-wrapper text-center">
              <div class="swiper-slide" data-slide-bg="images/home-slider-slide-1.jpg">
                <div class="swiper-slide-caption text-center">
                  <div class="container">
                    <div class="row justify-content-md-center">
                      <div class="col-md-11 col-lg-10 col-xl-9">
                        <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                          <h3 class="medium text-primary"></h3>
                        </div>
                        <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">ECONOTEST</h2>
                        <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Obten conocimientos de economía mediante ilustraciones en forma de cromos.</p>
                        <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="register">Empezar</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide" data-slide-bg="images/home-slider-slide-2.jpg">
                <div class="swiper-slide-caption text-center">
                  <div class="container">
                    <div class="row justify-content-md-center">
                      <div class="col-md-11 col-lg-10 col-xl-9">
                        <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                          <h3 class="medium text-primary"></h3>
                        </div>
                        <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">ECONOTEST</h2>
                        <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Obten conocimientos de economía mediante ilustraciones en forma de cromos.</p>
                        <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="register">Empezar</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide" data-slide-bg="images/home-slider-slide-3.jpg">
                <div class="swiper-slide-caption text-center">
                  <div class="container">
                    <div class="row justify-content-md-center">
                      <div class="col-md-11 col-lg-10 col-xl-9">
                        <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                          <h3 class="medium text-primary"></h3>
                        </div>
                        <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">ECONOTEST</h2>
                        <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Obten conocimientos de economía mediante ilustraciones en forma de cromos.</p>
                        <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="register">Empezar</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-scrollbar d-lg-none"></div>
            <div class="swiper-nav-wrap">
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
          </div>
        </section>
        <!-- FIN INICIO -->

        <!-- INFO -->
        <section id="info" class="bg-displaced-wrap" style="background-color: #fff">
          <div class="bg-displaced-body">
            <div class="container">
              <div class="inset-xl-left-70 inset-xl-right-70">
                <article class="box-cart bg-ebony-clay">
                  <div class="box-cart-image"><img src="images/about.jfif" alt="" width="342" height="338"/>
                  </div>
                  <div class="box-cart-body">
                    <blockquote class="blockquote-complex blockquote-complex-inverse">
                      <h3>Sobre ECONOTEST</h3>
                      <p>
                        <q>ECONOTEST es una solución software con fines educativos que ofrece un aprendizaje basado en la resolución de preguntas con fines de ganar cromos e ir coleccionandolos en un álbum digital.</q>
                      </p>
                    </blockquote>
                    <div class="button-wrap inset-md-left-70"><a class="button button-responsive button-medium button-primary-outline-v2" href="register">Empezar</a></div>
                  </div>
                </article>
              </div>
            </div>
          </div>
          <div class="bg-displaced bg-image" style="background-color: #BBC7A4;"></div>
        </section>
        <!-- FIN INFO -->

        <!-- PASOS -->
        <section id="pasos" class="section-50 section-md-75 section-lg-100" style="background-color: #fff">
          <div class="container">
          <h3>PASOS A SEGUIR</h3>
            <div class="row row-40">
              <div class="col-md-6 col-lg-4 height-fill">
                <article class="icon-box">
                  <div class="box-top">
                  <div class="box-icon"><img src="images/paso1.jpg" alt="" width="300" height="300"/></div>
                    <div class="box-header">
                      <h5><a href="#"></a></h5>
                    </div>
                  </div>
                  <div class="divider bg-accent"></div>
                  <div class="box-body">
                    <p>Registrate, es fácil y rápido.</p>
                  </div>
                </article>
              </div>
              <div class="col-md-6 col-lg-4 height-fill">
                <article class="icon-box">
                  <div class="box-top">
                    <div class="box-icon"><img src="images/paso2.jpg" alt="" width="300" height="300"/></div>
                    <div class="box-header">
                      <h5><a href="#"></a></h5>
                    </div>
                  </div>
                  <div class="divider bg-accent"></div>
                  <div class="box-body">
                    <p>Elige una temática y completa un quiz.</p>
                  </div>
                </article>
              </div>
              <div class="col-md-6 col-lg-4 height-fill">
                <article class="icon-box">
                  <div class="box-top">
                  <div class="box-icon"><img src="images/paso3.jpg" alt="" width="300" height="300"/></div>
                    <div class="box-header">
                      <h5><a href="#"></a></h5>
                    </div>
                  </div>
                  <div class="divider bg-accent"></div>
                  <div class="box-body">
                    <p>Gana cromos y completa los diversos álbumes disponibles.</p>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </section>
      </section>
      <!-- FIN BENEFICIOS -->
        
       <!-- FOOTER -->
       <div class=" footer-wrapper blue-bg">
            <div id="footer" class="white-text  layout-1 "> 
                <div class="footer_credit padding2">
                    <div class="region region-footer">
        
                        <div id="block-block-4" class="block block-block foot-logo">

                            <section class="blocks" id="Logo">
                                <h2 >Logo</h2>
                                <div class="content">
                                    <div id="logo">
                                        <p><img alt="" src="<?php echo e(asset('/img/footer/logo-utpl.png')); ?>" /></p>
                                    </div>
                                </div>
                            </section>
                        </div> <!-- /.block -->

                        <div id="block-block-3" class="block block-block contactos">
                
                            <section class="blocks" id="contactos">
                                <h2 >contactos</h2>
                                <div class="content">
                                    <h2>Contactos</h2>
                                    <p><strong>Ecuador</strong></p>
                                    <p><img alt="" src="<?php echo e(asset('/img/footer/icon-ubicacion.png')); ?>" style="height:18px; width:18px" />&nbsp San Cayetano Alto - Loja</p>
                                    <p><img alt="" src="<?php echo e(asset('/img/footer/icon-ubicacion.png')); ?>" style="height:18px; width:18px" /><a href="https://utpl.edu.ec/centros/">&nbsp Centros UTPL</a></p>
                                    <p><a href="https://utpl.edu.ec/buzon"><img alt="" src="<?php echo e(asset('/img/footer/icon-buzon.png')); ?>" style="width: 18px; height: 18px;" />&nbsp Buzón de consultas</a></p>
                                    <p><img alt="" src="<?php echo e(asset('/img/footer/icon-calll-center.png')); ?>" style="width: 18px; height: 18px;" />&nbsp 1800 88 75 88</p>
                                    <p><a href="https://api.whatsapp.com/send?phone=593999565400&amp;text=%C2%A1Hola!%20"><img alt="" src="<?php echo e(asset('/img/footer/icon-whatsapp.png')); ?>" style="width: 18px; height: 18px;" />&nbsp WhatsApp: 0999565400</a></p>
                                    <p><img alt="" src="<?php echo e(asset('/img/footer/icon-telefono.png')); ?>" style="height:18px; width:18px" />&nbsp PBX: 07 370 1444</p>
                                    <p> </p>
                                </div>
                            </section>
                        </div> <!-- /.block -->

                        <div id="block-block-5" class="block block-block vinculos">
                
                            <section class="blocks" id="vinculos">
                                <h2 >vinculos</h2>
                                <div class="content">
                                    <h2>Vínculos de interés</h2>
                                    <ul><li><a href="https://www.utpl.edu.ec/decidesermas">Decide ser más</a></li>
                                        <li><a href="https://www.utpl.edu.ec/internacional">Internacional</a></li>
                                        <li><a href="https://www.utpl.edu.ec/admisiones">Admisiones</a></li>
                                        <li><a href="https://eventos.utpl.edu.ec" target="_blank">Eventos</a></li>
                                        <li><a href="https://noticias.utpl.edu.ec">Noticias</a></li>
                                        <li><a href="https://alumni.utpl.edu.ec">Alumni</a></li>
                                        <li><a href="https://www.utpl.edu.ec/trabaja-con-nosotros/">Trabaja con nosotros</a></li>
                                    </ul>
                                </div>
                            </section>
                        </div> <!-- /.block -->
                    </div><!-- /.region -->
                </div>
            </div>
            <div class="padding1 copyright">
                <div class="flex layout-1 blocks">
                    <div><p>Copyright 2021. Universidad Técnica Particular de Loja </p> </div>
                    <div>   
                        <div class="flex items-social">
                            <div class="item-social"> 
                                <div class="bg">  
                                    <a href="https://es-la.facebook.com/utpl.loja/"><li style="width: 21px;" class="fab fa-facebook-square"></li></a>
                                </div>
                            </div>
                            <div class="item-social"> 
                                <div class="bg">  
                                    <a href="https://twitter.com/utpl?lang=es"><i style="width: 21px;" class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="item-social"> 
                                <div class="bg">  
                                    <a href="https://www.youtube.com/user/utpl/"><i style="width: 21px;" class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                            <div class="item-social"> 
                                <div class="bg">  
                                    <a href="https://www.instagram.com/utpl/?hl=es-la"><i style="width: 21px;" class="fab fa-instagram"></i></a>
                                </div>
                            </div>

                            <div class="item-social"> 
                                <div class="bg">  
                                    <a href="https://www.flickr.com/photos/utpl/"><i style="width: 21px;" class="fab fa-flickr"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN FOOTER -->
        <script src="<?php echo e(asset('/js/core.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/script.js')); ?>"></script>
    </body>
</html>



<?php /**PATH C:\Users\JuanJ\Desktop\ECONOTEST-CLIENTES\ProyectoCromos2021\EconoTest\resources\views/index.blade.php ENDPATH**/ ?>