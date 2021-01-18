



<?php $__env->startSection('styles-users'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <section class="p-5 section-50 " >
        <div class="container">
            <h3 class="text-center" >Tu información de perfil</h3>
            <form class="row">
                <div class="col-4">
                    <img src="<?php echo e(asset('img/cromos/017correa.jpg')); ?>"  class="rounded-lg mx-auto d-block" alt="">
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" placeholder="Tu nombre" value= <?php echo e(auth()->user()->name); ?>>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" placeholder="Tu email" value= <?php echo e(auth()->user()->email); ?>>
                    </div>
                    <div class="form-group">
                        <label for="">Pais</label>
                        <input type="text" class="form-control" placeholder="Tu pais" value= <?php echo e(auth()->user()->pais); ?>>
                    </div>
                    <div class="form-group">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" placeholder="Tu ciudad" value= <?php echo e(auth()->user()->ciudad); ?>>
                    </div>
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <input type="text" class="form-control" placeholder="Tu descripcion" value= <?php echo e(auth()->user()->descripcion); ?>>
                    </div>
                    <input type="submit"  class="btn btn-primary" value="Actualizar Perfil" >
                </div>
            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts-users'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.public.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoCromos2021\EconoTest\resources\views/perfil.blade.php ENDPATH**/ ?>