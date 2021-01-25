<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <?php if($message = Session::get('eliminado')): ?>
            <div class="alert alert-danger">
                <h5>Mensaje: </h5>
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <h5>Mensaje: </h5>
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>


        <div class="card mb-2 w-100">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-tasks"></i>
                    Preguntas
                </div>
                <a class="btn btn-primary btn-round " href="<?php echo e(route('preguntas.create')); ?>"> Añadir pregunta</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered tabla_preguntas" style="width:100%">
                        <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                            <th>Alternativa</th>
                            <th>Alternativa</th>
                            <th>Alternativa</th>
                            <th>Alternativa</th>
                            <th>Temática</th>
                            <th width="280px">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $preguntas2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pregunta->enunciado); ?></td>
                                <td><?php echo e($pregunta->opcion_correcta); ?></td>
                                <td><?php echo e($pregunta->opcion_1); ?></td>
                                <td><?php echo e($pregunta->opcion_2); ?></td>
                                <td><?php echo e($pregunta->opcion_3); ?></td>
                                <td><?php echo e($pregunta->opcion_4); ?></td>
                                <td><?php echo e($pregunta->nombre); ?></td>


                                <td class="d-flex justify-content-around">
                                    <a class="btn btn-primary" href="<?php echo e(route('preguntas.edit',$pregunta->id)); ?>">Editar</a>
                                    <form action="<?php echo e(route('preguntas.destroy',$pregunta->id)); ?>" method="POST">

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>

                        <tfoot>
                        <tr>
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                            <th>Alternativa</th>
                            <th>Alternativa</th>
                            <th>Alternativa</th>
                            <th>Alternativa</th>
                            <th>Temática</th>
                            <th width="280px">Acción</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                </div>
            </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JuanJ\Desktop\ECONOTEST ACTUAL\ProyectoCromos2021\EconoTest\resources\views/preguntas/index.blade.php ENDPATH**/ ?>