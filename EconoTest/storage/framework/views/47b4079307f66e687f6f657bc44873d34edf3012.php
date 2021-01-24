


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
                <select name="tematica_id" id="tematica_id">
                <?php $__currentLoopData = $tematicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tematica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value= "<?php echo e($tematica->id); ?>"><?php echo e($tematica->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Enunciado pregunta:</strong>
                <input type="text" name="enunciado" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Respuesta:</strong>
                <input type="text" class="form-control" style="height:150px" name="opcion_correcta"  onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 1:</strong>
                <input type="text" class="form-control" style="height:75px" name="opcion_1" placeholder="" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 2:</strong>
                <input type="text" class="form-control" style="height:75px" name="opcion_2" placeholder="" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 3:</strong>
                <input type="text" class="form-control" style="height:75px" name="opcion_3" placeholder="" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div>
   
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('preguntas.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\JuanJ\Desktop\ECONOTEST ACTUAL\ProyectoCromos2021\EconoTest\resources\views/preguntas/create.blade.php ENDPATH**/ ?>