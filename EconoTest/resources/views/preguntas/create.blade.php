@extends('layouts.main')
@extends('preguntas.layout')

@section('contenido')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar preguntas</h2>
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
   
<form action="{{ route('preguntas.store') }}" method="POST">
    @csrf
  
     <div class="row">
    <br>
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


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Enunciado pregunta:</strong>
                <input type="text" name="enunciado" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Respuesta:</strong>
                <input type="text" class="form-control" style="height:150px" name="opcion_correcta"  onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 1:</strong>
                <input type="text" class="form-control" style="height:75px" name="opcion_1" placeholder="" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 2:</strong>
                <input type="text" class="form-control" style="height:75px" name="opcion_2" placeholder="" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternativa 3:</strong>
                <input type="text" class="form-control" style="height:75px" name="opcion_3" placeholder="" onkeyup="javascript:this.value=this.value.toUpperCase();"
style="text-transform:uppercase;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div>
   
</form>
@endsection