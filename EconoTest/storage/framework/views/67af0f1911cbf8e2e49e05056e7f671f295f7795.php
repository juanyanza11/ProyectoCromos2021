


<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LISTADO DE PREGUNTAS ECONOTEST</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('preguntas.create')); ?>"> Añadir pregunta</a>
            </div>
        </div>
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered">
        <tr>
            <th>IdTematica</th>
            <th>Id</th>
            <th>Pregunta</th>
            <th>Respuesta</th>
            <th>Alternativa 1</th>
            <th>Alternativa 2</th>
            <th>Alternativa 3</th>


            <th width="280px">Accion</th>
        </tr>
        <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        
            <td><?php echo e($pregunta-> idTematica); ?></td>
            <td><?php echo e($pregunta-> id); ?></td>
            <td><?php echo e($pregunta->enunciado); ?></td>
            <td><?php echo e($pregunta->respuesta); ?></td>
            <td><?php echo e($pregunta->alternativa1); ?></td>
            <td><?php echo e($pregunta->alternativa2); ?></td>
            <td><?php echo e($pregunta->alternativa3); ?></td>

            <td>
                <form action="<?php echo e(route('preguntas.destroy',$pregunta->id)); ?>" method="POST">
   
                    <a class="btn btn-primary" href="<?php echo e(route('preguntas.edit',$pregunta->id)); ?>">Editar</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo $preguntas->links(); ?>

      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('preguntas.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aplicaciones\IntegradorV1\ProyectoCromos2021\EconoTest\resources\views/preguntas/index.blade.php ENDPATH**/ ?>