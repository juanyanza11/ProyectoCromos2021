


<?php $__env->startSection('contenido'); ?>
    <section class="section-md-75 ">
        <div class="container">
            <?php if($album->user_id === auth()->user()->id ): ?>
                <div class="cromos_ganados">
                    <?php $__currentLoopData = $cromosGanados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cromo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($cromo->cromo); ?>

                        <div class="fill" draggable="true" style="background-image:url('<?php echo e($cromo->cromo->imagen); ?>');position: relative; height: 150px; width: 150px;cursor: pointer; background-color:red;" ></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

        </div>
    </section>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('usuario.mainUser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoCromos2021\EconoTest\resources\views/album/index.blade.php ENDPATH**/ ?>