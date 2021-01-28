@extends('layouts.main')

@section('contenido')
    <div class ="row">
        @if($message = Session::get('Listo'))
            <div class = "col-12 alert alert-success alert-dismissable fade show" role = "alert">
                <h5>Mensaje: </h5>
                <span>{{$message}}</span>
            </div>
        @endif


        @if($message = Session::get('eliminado'))
            <div class = "col-12 alert alert-danger alert-dismissable fade show" role = "alert">
                <h5>Mensaje: </h5>
                <span>{{$message}}</span>
            </div>
        @endif

        <div class="card mb-2 w-100">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    Cromos
                </div>
                <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#modalAgregar"><i
                    class="fas fa-download fa-sm text-white-50"></i> Agregar Cromos</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="cromoTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Imagen</td>
                                <td>Temáticas</td>
                                <td width="200px" >Acciones</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>Id</td>
                                <td>Nombre</td>
                                <td>Descripción</td>
                                <td>Imagen</td>
                                <td>Temáticas</td>
                                <td width="200px" >Acciones</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($cromos) > 0)
                                @foreach ($cromos as $cromo)
                                    <tr>
                                        <td>{{ $cromo->id }}</td>
                                        <td>{{ $cromo->nombre }}</td>
                                        <td>{{ $cromo->descripcion }}</td>

                                        <td class="d-flex justify-content-center"><img src='{{asset("/img/cromos/{$cromo->imagen}")}}' alt="" style="width:70px"></td>

                                       <td>
                                            <ul>
                                                @foreach ($cromo->tematicas as $tematica)
                                                    <li>{{$tematica->nombre}}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td class="flex justify-content-around" >
                                            <button class= "btn btn-round  btn-primary btnEditar"
                                                    data-id ="{{ $cromo->id}}"
                                                    data-name ="{{ $cromo->nombre}}"
                                                    data-description ="{{ $cromo->descripcion}}"
                                                    data-album_id ="{{ $cromo->album_id}}"
                                                    data-imagen="{{ $cromo->imagen ? asset("/img/cromos/{$cromo->imagen}"): ''}}"
                                                    data-tematicas="{{$cromo->tematicas}}"
                                                    data-toggle="modal" data-target="#modalEditar"
                                            >
                                                Editar
                                            </button>
                                            <button class= "btn btn-round btn-danger btnEliminar" data-id ="{{ $cromo->id}}" data-toggle="modal" data-target="#modalEliminar">
                                                Eliminar
                                            </button>
                                            <form action = "{{ url('/admin', ['id'=>$cromo->id]) }}" method="post" id= "formEli_{{ $cromo->id }}">
                                                @csrf
                                                <input type ="hidden" name="id" value="{{ $cromo->id}}">
                                                <input type ="hidden" name="_method" value="delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

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
                <h5 class="modal-title" id="exampleModalLabel">Agregar cromos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action ="/admin/cromos" method ="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @if($message = Session::get('ErrorInsert'))
                        <div class = "col-12 alert alert-danger alert-dismissable fade show" role = "alert">
                            <h5>Errores: </h5>
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                        </div>
                    @endif
                    <div class = "form-group">
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre" value="{{ old('nombre') }}" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
                    </div>
                    <div class = "form-group">
                    <p>Descripción:</p>
                    <textarea name="descripcion" cols="62" rows="5" required class ="form-control" style="width: 100%; min-height: 200px; max-height: 200px" ></textarea>
                    </div>
                    <div class = "form-group">
                        <p>Imagen del cromo:</p>
                        <input  type = "file" class ="form-control" name ="img" placeholder="Imagen">
                    </div>
                    <p>Temáticas:</p>
                    <div class="row">
                        @foreach ($tematicas as $tematica)
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$tematica->id}}" name="tematicas[]" >
                                    <label class="form-check-label">
                                        {{$tematica->nombre}}
                                    </label>
                                  </div>
                            </div>
                        @endforeach
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
    @if(count($cromos) > 0)
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
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btnModalEliminar">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif


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
                @method('PUT')
                @csrf
                <div class="modal-body">
                    @if($message = Session::get('ErrorInsert'))
                        <div class = "col-12 alert alert-danger alert-dismissable fade show" role = "alert">
                            <h5>Errores: </h5>
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                        </div>
                    @endif
                    <input type = "hidden" name = "id" id= "idEdit">
                    <div class = "form-group">
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre"  id= "nameEdit" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
                    </div>
                    <div class = "form-group">
                        <textarea name="descripcion" cols="62" rows="5" class ="form-control" required id="descripcionEdit" style="width: 100%; min-height: 200px; max-height: 200px" ></textarea>

                    </div>
                    <img src="" alt="" id="imagen_edit" width="100" height="100">
                    <div class = "form-group"  id="subir_imagen_input" style="display:none" >
                        <p>Imagen del cromo:</p>
                        <input  type = "file" class ="form-control" name ="img" placeholder="Imagen">
                    </div>
                    <p>Temáticas:</p>
                    <div class="row">
                        @foreach ($tematicas as $tematica)
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input editCheckboxTematicas"   type="checkbox" value="{{$tematica->id}}" name="tematicas[]" >
                                    <label class="form-check-label">
                                        {{$tematica->nombre}}
                                    </label>
                                  </div>
                            </div>
                        @endforeach
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
@endsection

@section('scripts-admin')

    <script>
    $(document).ready(function(){



        @if($message = Session::get('ErrorInsert'))
            $('#modalAgregar').modal('show');
        @endif
        $(".btnEliminar").click(function(){
            let id = $(this).data('id');
            $('#formEliminar').attr('action', `/admin/cromos/${id}`);

        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });

        $(".btnEditar").click(function(){
            $('#subir_imagen_input').hide();
            $('#imagen_edit').hide();
            $('#imagen_edit').attr( 'src','');
            let id = $(this).data('id');
            $('#fromEditar').attr('action', `/admin/cromos/${id}`);
            $("#idEdit").val($(this).data('id'));
            $("#nameEdit").val($(this).data('name'));
            $("#descripcionEdit").val($(this).data('description'));
            let urlImagen = $(this).data('imagen');
            if(urlImagen !== ''){
                $('#imagen_edit').show();
                $('#imagen_edit').attr( 'src', urlImagen);

            }
            let tematicasAsinadas = $(this).data('tematicas');
            console.log( "tematicas", tematicasAsinadas);
            let checkboxEdit = $('.editCheckboxTematicas');
            console.log("check", checkboxEdit);
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
@endsection
