


<?php $__env->startSection('contenido'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar preguntas</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('preguntas.index')); ?>"> Back</a>
        </div>
    </div>
</div>
   
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
   
<form action="<?php echo e(route('preguntas.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  
     <div class="row">
    <br>
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TEMATICA:</strong>
                <select name="idTematica" id="idTematica">
                    <option value="EC-MACRO">MACROECONOMIA</option>
                    <option value="EC-METRIA">ECONOMETRIA</option>
                    <option value="EC-MICRO">MICROECONOMIA</option>
                </select>
            </div>
        </div>

     
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pregunta:</strong>
                <input type="text" name="enunciado" class="form-control" placeholder="Enunciado">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Respuesta:</strong>
                <input type="text" class="form-control" style="height:150px" name="respuesta" placeholder="Respuesta"></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 1:</strong>
                <input type="text" class="form-control" style="height:75px" name="alternativa1" placeholder=""></input>
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 2:</strong>
                <input type="text" class="form-control" style="height:75px" name="alternativa2" placeholder=""></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 3:</strong>
                <input type="text" class="form-control" style="height:75px" name="alternativa3" placeholder=""></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div>
   
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('preguntas.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aplicaciones\IntegradorV1\ProyectoCromos2021\EconoTest\resources\views/preguntas/create.blade.php ENDPATH**/ ?>