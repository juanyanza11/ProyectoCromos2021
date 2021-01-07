


<?php $__env->startSection('contenido'); ?>
    <section class="section-md-75 ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Resultado del examen:</h4>
                    <p>Total de preguntas : <?php echo e($total_preguntas); ?></p>
                    <p>Correctas: <?php echo e($correctas); ?></p>
                    <p>Erroneas: <?php echo e($erroneas); ?></p>
                </div>
                <?php if($paso): ?>
                    <p>Obtubiste premios y creaste tu album</p>
                <?php else: ?>
                    <p>No pasaste </p>
                <?php endif; ?>
            </div>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('usuario.mainUser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoCromos2021\EconoTest\resources\views/cuestionario/resultado.blade.php ENDPATH**/ ?>