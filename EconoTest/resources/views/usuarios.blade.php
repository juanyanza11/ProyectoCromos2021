@extends('layouts.main')

@section('contenido')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">USUARIOS</h1>
        <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#modalAgregar"><i
                class="fas fa-download fa-sm text-white-50"></i> Agregar usuarios</a>
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
                    <td>Email</td>
                    <td>Rol</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario -> id }}</td>
                        <td>{{ $usuario -> name }}</td>
                        <td>{{ $usuario -> email }}</td>
                        <td>{{ $usuario -> nombre_rol }}</td>
                        <td>
                            <button class= "btn btn-round btnEliminar" data-id ="{{ $usuario->id}}" data-toggle="modal" data-target="#modalEliminar"> 
                            <i class = "fa fa-trash"></i></button>
                            <button class= "btn btn-round btnEditar" 
                            data-id ="{{ $usuario->id}}" 
                            data-name ="{{ $usuario->name}}" 
                            data-email ="{{ $usuario->email}}" 
                            data-toggle="modal" data-target="#modalEditar"> 
                            <i class = "fa fa-edit"></i></button>
                            <form action = "{{ url('/admin', ['id'=>$usuario->id]) }}" method="post" id= "formEli_{{ $usuario->id }}">
                                @csrf
                                <input type ="hidden" name="id" value="{{ $usuario->id}}">
                                <input type ="hidden" name="_method" value="delete">

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>



    </div>
    <!-- Modal Agregar -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action ="/admin" method ="post">
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
                        <input  type = "email" class ="form-control" name ="email" placeholder="Email" value="{{ old('email') }}">
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
                        <input type="radio" id="administrador" name="rol" value="1"
                                checked>
                        <label for="huey">Administrador</label>
                        </div>

                        <div>
                        <input type="radio" id="estudiante" name="rol" value="2">
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
                        <input  type = "text" class ="form-control" name ="nombre" placeholder="Nombre" value="{{ old('nombre') }}" id= "nameEdit">
                    </div>
                    <div class = "form-group">
                        <input  type = "email" class ="form-control" name ="email" placeholder="Email" value="{{ old('email') }}" id = "emailEdit">
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
@endsection

@section('scripts')
    <script>
    var idEliminar = 0; 
    $(document).ready(function(){
        @if($message = Session::get('ErrorInsert'))
            $('#modalAgregar').modal('show');
        @endif
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
@endsection