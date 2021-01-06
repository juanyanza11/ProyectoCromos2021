

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
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <h5>¿Desea eliminar el usuario?</h5>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                    </div>
            </div>
        </div>
    </div>

        <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action ="/admin/edit" method ="post">
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
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre" value="<?php echo e(old('nombre')); ?>" id= "nameEdit">
                    </div>
                    <div class = "form-group">
                        <input  type = "email" class ="form-control" name ="email" placeholder="Email" value="<?php echo e(old('email')); ?>" id = "emailEdit">
                    </div>
                    <div class = "form-group">
                        <input  type = "password" class ="form-control" name ="pass1" placeholder="Password">
                    </div>
                    <div class = "form-group">
                        <input  type = "password" class ="form-control" name ="pass2" placeholder="Confirmar Password">
                    </div>
                    <div class = "form-group">
                        <p>Seleccione su Rol:</p>

                        <div>
                        <input type="radio" id="administrador" name="rol" value="1" id = "rolEdit"
                                checked>
                        <label for="huey">Administrador</label>
                        </div>

                        <div>
                        <input type="radio" id="estudiante" name="rol" value="2" id = "rolEdit">
                        <label for="dewey">Estudiante</label>
                        </div>
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
    var idEliminar = 0; 
    $(document).ready(function(){
        <?php if($message = Session::get('ErrorInsert')): ?> 
            $('#modalAgregar').modal('show');
        <?php endif; ?>
        $(".btnEliminar").click(function(){
            idEliminar = $(this).data('id');
        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });

        $(".btnEditar").click(function(){
            $("#idEdit").val($(this).data('id'));
            $("#nameEdit").val($(this).data('name'));
            $("#emailEdit").val($(this).data('email'));
            $("#rolEdit").val($(this).data('rol'));

        });
    });      
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoCromos2021\EconoTest\resources\views/cromos.blade.php ENDPATH**/ ?>