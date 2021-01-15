@extends('layouts.main')
@extends('preguntas.layout')

@section('contenido')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        en este modulo se hace el crud de preguntas
    </div>
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="card mb-2 w-100">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-tasks"></i>
                    Preguntas
                </div>
                <a class="btn btn-primary btn-round " href="{{ route('preguntas.create') }}"> Añadir pregunta</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered tabla_preguntas" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Pregunta</th>
                <th>Respuesta</th>
                <th>Alternativa 1</th>
                <th>Alternativa 2</th>
                <th>Alternativa 3</th>
                <th>Alternativa 4</th>
                <th>Temática</th>
                <th width="280px">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preguntas2 as $pregunta)
                <tr>
                    <td>{{ $pregunta-> id }}</td>
                    <td>{{ $pregunta->enunciado }}</td>
                    <td>{{ $pregunta->opcion_correcta}}</td>
                    <td>{{ $pregunta->opcion_1 }}</td>
                    <td>{{ $pregunta->opcion_2 }}</td>
                    <td>{{ $pregunta->opcion_3 }}</td>
                    <td>{{ $pregunta->opcion_4 }}</td>
                    <td>{{ $pregunta->nombre }}</td>


                                    <td class="d-flex justify-content-around" >
                                        <a class="btn btn-primary" href="{{ route('preguntas.edit',$pregunta->id) }}">Editar</a>
                                        <form action="{{ route('preguntas.destroy',$pregunta->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection

