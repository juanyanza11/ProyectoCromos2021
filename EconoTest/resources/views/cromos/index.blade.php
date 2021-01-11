@extends('layouts.main')

@section('contenido')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CROMOS</h1>
        <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#modalAgregar"><i
                class="fas fa-download fa-sm text-white-50"></i> Agregar Cromos</a>
    </div>
    <div class ="row">
        @if($message = Session::get('Listo'))
            <div class = "col-12 alert alert-success alert-dismissable fade show" role = "alert">
                <h5>Mensaje: </h5>            
                <span>{{$message}}</span>
            </div>
        @endif



        
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
                @if(count($cromos) > 0)
                    @foreach ($cromos as $cromo)
                        <tr>
                            <td>{{ $cromo -> id }}</td>
                            <td>{{ $cromo -> nombre }}</td>
                            <td>{{ $cromo -> descripcion }}</td>
                            <td><img src='{{asset("/img/cromos/{$cromo->imagen}")}}' alt="" style="width:70px"></td>
                            <td>
                                <button class= "btn btn-round btnEliminar" data-id ="{{ $cromo->id}}" data-toggle="modal" data-target="#modalEliminar"> 
                                <i class = "fa fa-trash"></i></button>
                                <button class= "btn btn-round btnEditar" 
                                data-id ="{{ $cromo->id}}" 
                                data-name ="{{ $cromo->nombre}}" 
                                data-description ="{{ $cromo->descripcion}}"
                                data-imagen="{{asset("/img/cromos/{$cromo->imagen}")}}"
                                data-toggle="modal" data-target="#modalEditar"> 
                                <i class = "fa fa-edit"></i></button>
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
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
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
@endsection

@section('scripts')
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
@endsection