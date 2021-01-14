

<?php $__env->startSection('coleccionMenu'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <section id="quiz" class="section-md-75 ">
        <div class="container">
            <div class="row row-40">
                <?php $__currentLoopData = $tematicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tematica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 height-fill">
                        <article class="icon-box1">
                            <a href="<?php echo e(route('preguntas.usuario.index', ['id' => $tematica->id])); ?>">
                                <div class="box-top">
                                    <div class="box-icon1"><img src="images/beneficios1.jfif" alt="" width="300" height="300"/></div>
                                    <div class="box-header">
                                        <h5><a href="#"></a></h5>
                                    </div>
                                </div>
                                <div class="divider bg-accent"></div>
                                <div class="box-body">
                                    <h5><?php echo e($tematica->nombre); ?></h5>
                                </div>
                            </a>
                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('usuario.mainUser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyectos\ProyectoCromos2021\EconoTest\resources\views/home.blade.php ENDPATH**/ ?>