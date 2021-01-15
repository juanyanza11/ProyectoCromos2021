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
                    Temáticas
                </div>
                <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#modalAgregar"><i
                    class="fas fa-download fa-sm text-white-50"></i> Agregar Temática</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="cromoTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Nombre</td>
                                <td>Imagen</td>
                                <td width="200px" >Acciones</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>Id</td>
                                <td>Nombre</td>
                                <td>Imagen</td>
                                <td width="200px" >Acciones</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($tematicas) > 0)
                                @foreach ($tematicas as $tematica)
                                    <tr>
                                        <td>{{ $tematica -> id }}</td>
                                        <td>{{ $tematica -> nombre }}</td>
                                        <td><img src='{{asset("/img/tematicas/{$tematica->imagen}")}}' alt="" style="width:70px"></td>
                                        <td class="d-flex justify-content-around" >
                                            <button class= "btn btn-round  btn-primary btnEditar"
                                                    data-id ="{{ $tematica->id}}"
                                                    data-name ="{{ $tematica->nombre}}"
                                                    data-imagen="{{ $tematica->imagen ? asset("/img/tematicas/{$tematica->imagen}"): ''}}"
                                                    data-toggle="modal" data-target="#modalEditar"
                                            >
                                                Editar
                                            </button>
                                            <button class= "btn btn-round btn-danger btnEliminar" data-id ="{{ $tematica->id}}" data-toggle="modal" data-target="#modalEliminar">
                                                Eliminar
                                            </button>
                                            <form action = "{{ url('/admin', ['id'=>$tematica->id]) }}" method="post" id= "formEli_{{ $tematica->id }}">
                                                @csrf
                                                <input type ="hidden" name="id" value="{{ $tematica->id}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Agregar temáticas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action ="/admin/tematicas" method ="post" enctype="multipart/form-data">
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
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                    </div>
                    
                    <div class = "form-group">
                        <p>Imagen de la temática:</p>
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
    @if(count($tematicas) > 0)
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar temáticas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>¿Desea eliminar la temática?</h5>
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
                <h5 class="modal-title" id="exampleModalLabel">Editar temáticas</h5>
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
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre"  id= "nameEdit">
                    </div>
                    <img src="" alt="" id="imagen_edit" width="250" style="display:none">
                    <div class = "form-group"  id="subir_imagen_input" style="display:none" >
                        <p>Imagen de la temática:</p>
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
@endsection

@section('scripts-admin')

    <script>
    $(document).ready(function(){

        @if($message = Session::get('ErrorInsert'))
            $('#modalAgregar').modal('show');
        @endif
        $(".btnEliminar").click(function(){
            let id = $(this).data('id');
            $('#formEliminar').attr('action', `/admin/tematicas/${id}`);

        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });

        $(".btnEditar").click(function(){
            $('#subir_imagen_input').hide();
            $('#imagen_edit').hide();
            $('#imagen_edit').attr( 'src','');
            let id = $(this).data('id');
            $('#fromEditar').attr('action', `/admin/tematicas/${id}`);
            $("#idEdit").val($(this).data('id'));
            $("#nameEdit").val($(this).data('name'));
            $("#descripcionEdit").val($(this).data('description'));
            let urlImagen = $(this).data('imagen');
            console.log(urlImagen);
            if(urlImagen !== ''){
                $('#imagen_edit').show();
                $('#imagen_edit').attr( 'src', urlImagen);

            }
            $('#subir_imagen_input').show();


        });
    });
    </script>
    
@endsection
