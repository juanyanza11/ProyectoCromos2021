

<?php $__env->startSection('contenido'); ?>

    <section id="quiz" class="p-5">
        <div class="container">
            <?php if( !isset($albums) || count($albums) <= 0): ?>
                <h3 id="titulosMitad"> No tienes ningun album asignado, realiza un test y recibe tu primer album </h3>
            <?php else: ?>
                <h3 class="text-center" >Mis Álbumes</h3>
                <div class="row">
                    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $tematicaId = $album->pivot->tematica_id;

                            $tematicaNombre = "";
                            foreach($tematicas as $tematica){

                                if($tematicaId == $tematica->id){
                                    $tematicaNombre = $tematica->nombre;
                                }
                            }
                        ?>

                        <div class="card m-2" style="width: 22rem;">
                            <div class="card-body ">
                                <h5 class="card-title"><?php echo e($album->nombre); ?> </h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo e($tematicaNombre); ?></h6>
                                <a href="<?php echo e(route('album.index', ['album' => $album->pivot->tematica_id])); ?>" class="card-link">Ver mi Álbum</a>
                                <a href="<?php echo e(route('albums.single', ['album' => $album->id])); ?>" class="card-link">Ir a la temática</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JuanJ\Desktop\ECONOTEST ACTUAL\ProyectoCromos2021\EconoTest\resources\views/album/coleccion.blade.php ENDPATH**/ ?>