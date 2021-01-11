

<?php $__env->startSection('contenido'); ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CROMOS</h1>
        <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#modalAgregar"><i
                class="fas fa-download fa-sm text-white-50"></i> Agregar Cromos</a>
    </div>
    <div class ="row">
        <?php if($message = Session::get('Listo')): ?>
            <div class = "col-12 alert alert-success alert-dismissable fade show" role = "alert">
                <h5>Mensaje: </h5>            
                <span><?php echo e($message); ?></span>
            </div>
        <?php endif; ?>



        
        <table class = "table col-12 table-resposive">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Imagen</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                <?php if(count($cromos) > 0): ?>
                    <?php $__currentLoopData = $cromos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cromo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cromo -> id); ?></td>
                            <td><?php echo e($cromo -> nombre); ?></td>
                            <td><?php echo e($cromo -> descripcion); ?></td>
                            <td><img src='<?php echo e(asset("/img/cromos/{$cromo->imagen}")); ?>' alt="" style="width:70px"></td>
                            <td>
                                <button class= "btn btn-round btnEliminar" data-id ="<?php echo e($cromo->id); ?>" data-toggle="modal" data-target="#modalEliminar"> 
                                <i class = "fa fa-trash"></i></button>
                                <button class= "btn btn-round btnEditar" 
                                data-id ="<?php echo e($cromo->id); ?>" 
                                data-name ="<?php echo e($cromo->nombre); ?>" 
                                data-description ="<?php echo e($cromo->descripcion); ?>"
                                data-imagen="<?php echo e(asset("/img/cromos/{$cromo->imagen}")); ?>"
                                data-toggle="modal" data-target="#modalEditar"> 
                                <i class = "fa fa-edit"></i></button>
                                <form action = "<?php echo e(url('/admin', ['id'=>$cromo->id])); ?>" method="post" id= "formEli_<?php echo e($cromo->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type ="hidden" name="id" value="<?php echo e($cromo->id); ?>">
                                    <input type ="hidden" name="_method" value="delete">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        
        </table>


    </div>
    <!-- Modal Agregar -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar cromos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action ="/admin/cromos" method ="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <?php if($message = Session::get('ErrorInsert')): ?> 
                        <div class = "col-12 alert alert-danger alert-dismissable fade show" role = "alert">
                            <h5>Errores: </h5>            
                                <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                        </div>
                    <?php endif; ?>
                    <div class = "form-group">
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre" value="<?php echo e(old('nombre')); ?>">
                    </div>
                    <div class = "form-group">
                    <p>Descripción:</p>
                    <p><textarea name="descripcion" cols="62" rows="5" required></textarea></p>
                    </div>
                    <div class = "form-group">
                        <p>Imagen del cromo:</p>
                        <input  type = "file" class ="form-control" name ="img" placeholder="Imagen">
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal Eliminar -->
    <?php if(count($cromos) > 0): ?>
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar cromos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>¿Desea eliminar el cromo?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="" method="POST" id="formEliminar" >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btnModalEliminar">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

        <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar cromos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method ="post" id="fromEditar" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <?php if($message = Session::get('ErrorInsert')): ?> 
                        <div class = "col-12 alert alert-danger alert-dismissable fade show" role = "alert">
                            <h5>Errores: </h5>            
                                <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                        </div>
                    <?php endif; ?>
                    <input type = "hidden" name = "id" id= "idEdit">
                    <div class = "form-group">
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre"  id= "nameEdit">
                    </div>
                    <div class = "form-group">
                        <input  type = "text" class ="form-control" name ="descripcion" placeholder="descripcion"  id="descripcionEdit">
                    </div>
                    <p>Imagen del cromo:</p>
                    <img src="" alt="" id="imagen_edit" width="100" height="100">
                    <div class = "form-group"  id="subir_imagen_input" style="display:none" >
                        <input  type = "file" class ="form-control" name ="img" placeholder="Imagen">
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
    $(document).ready(function(){
        <?php if($message = Session::get('ErrorInsert')): ?>
            $('#modalAgregar').modal('show');
        <?php endif; ?>
        $(".btnEliminar").click(function(){
            let id = $(this).data('id');
            $('#formEliminar').attr('action', `/admin/cromos/${id}`);

        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });

        $(".btnEditar").click(function(){
            $('#subir_imagen_input').hide();
            let id = $(this).data('id');
            $('#fromEditar').attr('action', `/admin/cromos/${id}`);
            $("#idEdit").val($(this).data('id'));
            $("#nameEdit").val($(this).data('name'));
            $("#descripcionEdit").val($(this).data('description'));
            let urlImagen = $(this).data('imagen');
            if(urlImagen !== ''){
                console.log("aqui se sube la imagen")
                $('#imagen_edit').attr( 'src', urlImagen);
                $('#subir_imagen_input').show();
            }



        });
    });   
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoCromos2021\EconoTest\resources\views/cromos/index.blade.php ENDPATH**/ ?>