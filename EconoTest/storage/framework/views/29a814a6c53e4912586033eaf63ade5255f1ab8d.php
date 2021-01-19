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

    <?php echo $__env->yieldContent('styles-users'); ?>

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
                                    <li class="<?php echo e(Request::is('albunes') ? 'active' : ''); ?>"><a href="/albunes">Albunes</a>
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
                                        <div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="register">REGISTRARSE</a></div>
                                        <ul class="rd-navbar-nav">
                                            <li class="active"><a href="#inicio">Inicio</a>
                                            </li>
                                            <li><a href="#info">Sobre Econotest</a>
                                            </li>
                                            <li><a href="#beneficios">Beneficios</a>
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

<?php echo $__env->yieldContent('contenido'); ?>

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

<script src="<?php echo e(asset('/js/core.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/script.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts-users'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ProyectoCromos2021\EconoTest\resources\views/layouts/public/main.blade.php ENDPATH**/ ?>