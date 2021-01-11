@extends('layouts.main')
@extends('preguntas.layout')

@section('contenido')
    <div class="row p-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LISTADO DE PREGUNTAS ECONOTEST</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('preguntas.create') }}"> Añadir pregunta</a>
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
                <th>Tematica</th>
                <th width="280px">Accion</th>
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
                    <td>{{ $pregunta->nombre }}</td>


                    <td>
                        <form action="{{ route('preguntas.destroy',$pregunta->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('preguntas.edit',$pregunta->id) }}">Editar</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
      
@endsection

