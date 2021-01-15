

<?php $__env->startSection('coleccionMenu'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <section class="section-md-75 ">
        <div class="container">
            <modal-quiz-component></modal-quiz-component>
            <div class="row">
                <div class="col">
                    <form  action=" <?php echo e(route('preguntas.usuario.quiz')); ?> "  method="POST">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h4><?php echo e($pregunta->enunciado); ?></h4>
                            <input type="hidden"  class="respuesta_correcta" name="pregunta_<?php echo e($pregunta->id); ?>_response"   value="<?php echo e($pregunta->opcion_correcta); ?>">
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_<?php echo e($pregunta->id); ?>" id="pregunta_<?php echo e($pregunta->id); ?>" value="<?php echo e($pregunta->opcion_1); ?>" >
                                <label class="form-check-label">
                                    <?php echo e($pregunta->opcion_1); ?>

                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_<?php echo e($pregunta->id); ?>"  id="pregunta_<?php echo e($pregunta->id); ?>" value="<?php echo e($pregunta->opcion_2); ?>">
                                <label class="form-check-label">
                                    <?php echo e($pregunta->opcion_2); ?>

                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_<?php echo e($pregunta->id); ?>" id="pregunta_<?php echo e($pregunta->id); ?>" value="<?php echo e($pregunta->opcion_3); ?>">
                                <label class="form-check-label">
                                    <?php echo e($pregunta->opcion_3); ?>

                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_<?php echo e($pregunta->id); ?>"  id="pregunta_<?php echo e($pregunta->id); ?>" value="<?php echo e($pregunta->opcion_4); ?>">
                                <label class="form-check-label">
                                    <?php echo e($pregunta->opcion_4); ?>

                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <button type="submit">Terminar Quiz</button>
                    </form>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('usuario.mainUser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyectos\ProyectoCromos2021\EconoTest\resources\views/cuestionario/index.blade.php ENDPATH**/ ?>