@extends('usuario.mainUser')

@section('coleccionMenu')

@endsection

@section('contenido')
    <section class="section-md-75 ">
        <div class="container">
            <modal-quiz-component></modal-quiz-component>
            <div class="row">
                <div class="col">
                    <form  action=" {{route('preguntas.usuario.quiz')}} "  method="POST">
                        @csrf
                        @foreach($preguntas as $pregunta)
                            <h4>{{$pregunta->enunciado}}</h4>
                            <input type="hidden"  class="respuesta_correcta" name="pregunta_{{$pregunta->id}}_response"   value="{{$pregunta->opcion_correcta}}">
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_{{$pregunta->id}}" id="pregunta_{{$pregunta->id}}" value="{{$pregunta->opcion_1}}" >
                                <label class="form-check-label">
                                    {{$pregunta->opcion_1}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_{{$pregunta->id}}"  id="pregunta_{{$pregunta->id}}" value="{{$pregunta->opcion_2}}">
                                <label class="form-check-label">
                                    {{$pregunta->opcion_2}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_{{$pregunta->id}}" id="pregunta_{{$pregunta->id}}" value="{{$pregunta->opcion_3}}">
                                <label class="form-check-label">
                                    {{$pregunta->opcion_3}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_{{$pregunta->id}}"  id="pregunta_{{$pregunta->id}}" value="{{$pregunta->opcion_4}}">
                                <label class="form-check-label">
                                    {{$pregunta->opcion_4}}
                                </label>
                            </div>
                        @endforeach
                        <button type="submit">Terminar Quiz</button>
                    </form>
                </div>
            </div>
        </div>

@endsection


@section('scripts')
    <script>


    </script>
@endsection
