@extends('layouts.main')
@extends('preguntas.layout')
   
@section('contenido')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar pregunta</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('preguntas.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('preguntas.update',$pregunta->id) }}" method="POST">
        @csrf
        @method('PUT')
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TEMATICA:</strong>
                <select name="tematica_id" id="tematica_id">
                @foreach($tematicas as $tematica)
                    <option value= "{{ $tematica->id }}">{{ $tematica->nombre }}</option>
                @endforeach
                </select>
            </div>
        </div>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Enunciado:</strong>
                    <input type="text" name="enunciado" value="{{ $pregunta->enunciado }}" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <strong>Respuesta:</strong>
                    <input type="text" name="opcion_correcta" value="{{ $pregunta->opcion_correcta}}" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase; height:150px;">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alternativa 1:</strong>
                    <input type="text" name="opcion_1" value="{{ $pregunta->opcion_1}}" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alternativa 2:</strong>
                    <input type="text" name="opcion_2" value="{{ $pregunta->opcion_2 }}" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alternativa 3:</strong>
                    <input type="text" name="opcion_3" value="{{ $pregunta->opcion_3 }}" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
   
    </form>
@endsection