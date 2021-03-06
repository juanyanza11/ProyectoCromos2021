

<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>


        <div class="card mb-2 w-100">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-tasks"></i>
                    Álbums
                </div>
                <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#modalAgregar"><i
                    class="fas fa-download fa-sm text-white-50"></i> Agregar Álbum</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="cromoTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Tematicas</th>
                            <th width="200px">Accion</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Imágen</th>
                                <th>Tematicas</th>
                                <th width="200px">Accion</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($album->nombre); ?></td>
                                    <td><?php echo e($album->descripcion); ?></td>
                                    <td class="d-flex justify-content-center"><img src='<?php echo e(asset("/img/albunes/{$album->imagen}")); ?>' alt="" style="width:70px"></td>
                                    <td>
                                        <ul>
                                            <?php $__currentLoopData = $album->tematicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tematica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($tematica->nombre); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </td>
                                    <td class="flex justify-content-around" >
                                        <button class= "btn btn-round  btn-primary btnEditar"
                                            data-id ="<?php echo e($album->id); ?>"
                                            data-name ="<?php echo e($album->nombre); ?>"
                                            data-description ="<?php echo e($album->descripcion); ?>"
                                            data-imagen="<?php echo e($album->imagen ? asset("/img/albunes/{$album->imagen}"): ''); ?>"
                                            data-tematicas="<?php echo e($album->tematicas); ?>"
                                            data-toggle="modal" data-target="#modalEditar"
                                        >
                                            Editar
                                        </button>
                                        <button class= "btn btn-round btn-danger btnEliminar" data-id ="<?php echo e($album->id); ?>" data-toggle="modal" data-target="#modalEliminar">
                                            Eliminar
                                        </button>
                                        <form action="" method="post" id= "formEli_<?php echo e($album->id); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type ="hidden" name="id" value="<?php echo e($album->id); ?>">
                                            <input type ="hidden" name="_method" value="delete">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Álbum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action ="/admin/albums" method ="post" enctype="multipart/form-data">
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
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre" value="<?php echo e(old('nombre')); ?>" onkeyup="javascript:this.value=this.value.toUpperCase();"
                        style="text-transform:uppercase;">
                    </div>
                    <div class = "form-group">
                    <p>Descripción:</p>
                    <textarea name="descripcion" cols="62" rows="5" required class ="form-control" style="width: 100%; min-height: 200px; max-height: 200px" ></textarea>
                    </div>
                    <div class = "form-group">
                        <p>Imagen del Álbum:</p>
                        <input  type = "file" class ="form-control" name ="img" placeholder="Imagen">
                    </div>
                    <p>Tematicas</p>
                    <div class="row">
                        <?php $__currentLoopData = $tematicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tematica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo e($tematica->id); ?>" name="tematicas[]" >
                                    <label class="form-check-label">
                                        <?php echo e($tematica->nombre); ?>

                                    </label>
                                  </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php if(count($albums) > 0): ?>
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Álbum</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>¿Desea eliminar el álbum?</h5>
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Álbum</h5>
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
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre"  id= "nameEdit" onkeyup="javascript:this.value=this.value.toUpperCase();"
                        style="text-transform:uppercase;">
                    </div>
                    <div class = "form-group">
                    <p>Descripción:</p>
                    <textarea id = "descripcionEdit" name="descripcion" cols="62" rows="5" required class ="form-control" style="width: 100%; min-height: 200px; max-height: 200px" ></textarea>
                    </div>
                    <img src="" alt="" id="imagen_edit" width="100" height="100">
                    <div class = "form-group"  id="subir_imagen_input" style="display:none" >
                        <p>Imagen del Álbum:</p>
                        <input  type = "file" class ="form-control" name ="img" placeholder="Imagen">
                    </div>
                    <p>Tematicas</p>
                    <div class="row">
                        <?php $__currentLoopData = $tematicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tematica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input editCheckboxTematicas"   type="checkbox" value="<?php echo e($tematica->id); ?>" name="tematicas[]" >
                                    <label class="form-check-label">
                                        <?php echo e($tematica->nombre); ?>

                                    </label>
                                  </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


<?php $__env->startSection('scripts-admin'); ?>

    <script>
    $(document).ready(function(){



        <?php if($message = Session::get('ErrorInsert')): ?>
            $('#modalAgregar').modal('show');
        <?php endif; ?>
        $(".btnEliminar").click(function(){
            let id = $(this).data('id');
            $('#formEliminar').attr('action', `/admin/albums/${id}`);
        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });

        $(".btnEditar").click(function(){
            $('#subir_imagen_input').hide();
            $('#imagen_edit').hide();
            $('#imagen_edit').attr( 'src','');
            let id = $(this).data('id');
            $('#fromEditar').attr('action', `/admin/albums/${id}`);
            $("#idEdit").val($(this).data('id'));
            $("#nameEdit").val($(this).data('name'));
            $("#descripcionEdit").val($(this).data('description'));
            let urlImagen = $(this).data('imagen');
            if(urlImagen !== ''){
                $('#imagen_edit').show();
                $('#imagen_edit').attr( 'src', urlImagen);

            }
            let tematicasAsinadas = $(this).data('tematicas');
            let checkboxEdit = $('.editCheckboxTematicas');
            for(const check of checkboxEdit){
                tematicasAsinadas.forEach(tematica => {
                    if(tematica.id == check.value){
                        check.checked = true;
                        console.log("Si es");
                    }
                });
            }
            $('#subir_imagen_input').show();


        });
    });
    </script>

<script>$(document).ready(function() {
    $.noConflict();
    $('#cromoTable').DataTable();
} );</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoCromos2021\EconoTest\resources\views/admin/albums/index.blade.php ENDPATH**/ ?>