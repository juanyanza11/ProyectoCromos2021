



<?php $__env->startSection('styles-users'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <section id="quiz" class="p-5">
        <div class="container">
            <div class="row row-40">
                <input type="hidden" id="token_consulta" value="<?php echo e(csrf_token()); ?>" >
                <input type="hidden" id="user_id" value="<?php echo e(auth()->user()->id); ?>" >
                <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 height-fill">
                        <a href="<?php echo e(route('albums.single', ['id' => $album->id])); ?>">
                            <article class="icon-box1 abrirQuiz " data-id="<?php echo e($album->id); ?>" >
                                <div class="box-top">
                                    <div class="box-icon1"><img src="images/beneficios1.jfif" alt="" width="300" height="300"/></div>
                                    <div class="box-header">
                                        <h5><a href="#"></a></h5>
                                    </div>
                                </div>
                                <div class="divider bg-accent"></div>
                                <div class="box-body">
                                    <h5><?php echo e($album->nombre); ?></h5>
                                </div>
                            </article>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts-users'); ?>
 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.public.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoCromos2021\EconoTest\resources\views/home/albums.blade.php ENDPATH**/ ?>