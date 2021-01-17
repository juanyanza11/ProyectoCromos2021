


<?php $__env->startSection('styles-users'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <style>
        .cromos_ganados .owl-stage-outer{
            overflow: hidden;
        }
        .cromos_ganados .owl-stage{
            display: flex;
            width: 100% !important;
        }
        .cromos_ganados .owl-nav{

        }
        .owl-prev, .owl-next{
            position: relative;
            margin: 10px;
        }
        .cromos_ganados .owl-nav{
            width: 100px;
        }
        .cromos_ganados .owl-dots{
            display: none !important;
        }
        .botomes{
            display: flex;
            justify-content: center;
        }
        .botomes button{
            margin: 15px;
        }
        .fill{
            position: relative;
            height: 150px;
            width: 150px;
            cursor: pointer;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px;
        }
        .cromos-listos{
            position: relative;
            height: 150px;
            width: 150px;
            cursor: pointer;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px;
        }
        .listado-cromos{
            display: flex;
            flex-wrap: nowrap;
        }
        .vacio{
            height: 160px;
            width: 160px;
            margin: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .vacio.filtro{
            filter: grayscale(100%);
            background-size: cover;
            background-repeat: no-repeat;
            height: 150px;
            width: 150px;
        }

        .hold{
            border: solid gray 4px;
        }

        .hovered{
            filter: none;
        }
        .invisible{
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <section class="section-md-75 "  style="min-height: 300px">
        <div class="container">
            <h4 class="text-center" >Cromos que este usuario gano y no estan en el album</h4>
            <div class="cromos_ganados">
                <?php $__currentLoopData = $cromosGanados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cromo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="vacio">
                        <div class="fill" data-cromo-id="<?php echo e($cromo->cromo->id); ?>" draggable="true" style="background-image:url('<?php echo e(asset("/img/cromos/{$cromo->cromo->imagen}")); ?>');position: relative; height: 150px; width: 150px;cursor: pointer; " ></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <h4 class="text-center" >Pon tus cromos aqui</h4>
            <div class="listado-cromos">
                <?php $__currentLoopData = $cromos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cromo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="vacio filtro" >
                        <div class="cromos-listos"  data-cromo-id="<?php echo e($cromo->id); ?>" style="background-image:url('<?php echo e(asset("/img/cromos/{$cromo->imagen}")); ?>');position: relative; height: 150px; width: 150px; " ></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-users'); ?>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>" ></script>
    <script >
        $(document).ready(function(){
            $('.cromos_ganados').owlCarousel({
                mouseDrag: false,
                items: 5
            });
        });
        let fills = document.querySelectorAll('.fill');
        let vacios = document.querySelectorAll('.vacio');

        let idCromoParaPonerlo = null;

        // Fill listener
        for(const fill of fills){
            fill.addEventListener('dragstart', dragStart);
            fill.addEventListener('dragend', dragEnd);
        }

        for(const vacio of vacios){
            vacio.addEventListener('dragover', dragOver);
            vacio.addEventListener('dragenter', dragEnter);
            vacio.addEventListener('dragleave', dragLeave);
            vacio.addEventListener('drop', drop);
        }

        function  dragStart(e){
            idCromoParaPonerlo = e.target.dataset.cromoId;
            console.log("start");
        }

        function dragEnd(){
            this.className = 'fill';
        }

        function dragOver(e){
            e.preventDefault();
        }

        function dragEnter(e){
            e.preventDefault();
        }

        function dragLeave(e){
        }

        function drop(e){
            let cromoId = e.target.dataset.cromoId;
            if(cromoId == idCromoParaPonerlo){
                console.log("es igual", e.target.parentElement.style.filter = "grayScale(0%)");
            }else{
                console.log("no es igual")
            }
            console.log("drop");
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JuanJ\Desktop\ECONOTEST ACTUAL\ProyectoCromos2021\EconoTest\resources\views/album/index.blade.php ENDPATH**/ ?>