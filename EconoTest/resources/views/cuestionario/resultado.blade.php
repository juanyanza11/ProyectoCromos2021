@extends('usuario.mainUser')


@section('contenido')
    <section class="section-md-75 ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Resultado del examen:</h4>
                    <p>Total de preguntas : {{$total_preguntas}}</p>
                    <p>Correctas: {{$correctas}}</p>
                    <p>Erroneas: {{$erroneas}}</p>
                </div>
                @if($paso)
                    <p>Obtubiste premios y creaste tu album</p>
                @else
                    <p>No pasaste </p>
                @endif
            </div>
        </div>


@endsection
