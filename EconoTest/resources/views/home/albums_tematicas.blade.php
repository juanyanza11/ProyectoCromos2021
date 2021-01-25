{{--@extends('usuario.mainUser')--}}
@extends('layouts.public.main')


@section('styles-users')
    <link rel="stylesheet" href="{{ asset('css/quiz.css')  }}">
@endsection

@section('contenido')
    <section id="quiz" class="p-5" style="min-height: 555px">
        <div class="container">
                @if (count($album->tematicas) > 0)
                <h3 id="titulos" class="text-center" >Escoge una temática para empezar un Quiz</h3>

                <div class="row row-40">
                    <input type="hidden" id="token_consulta" value="{{ csrf_token()}}" >
                    <input type="hidden" id="user_id" value="{{ auth()->user()->id}}" >
                    <input type="hidden" id="tematica_id" value="" >
                    <input type="hidden" id="album_id" value="{{$album->id}}" >
                    @foreach($album->tematicas as $tematica)
                        <div class="col-md-6 col-lg-4 height-fill">
                            <article class="icon-box1 abrirQuiz " data-id="{{$tematica->id}}">
                                <div class="box-top">
                                    <div class="box-icon1"><img id="imgSombra" src='{{asset("/img/tematicas/{$tematica->imagen}")}}' alt="" width="300" height="300"/></div>
                                    <div class="box-header">
                                        <h5><a href="#"></a></h5>
                                    </div>
                                </div>
                                <div class="divider bg-accent"></div>
                                <div class="box-body">
                                    <h5>{{$tematica->nombre}}</h5>
                                </div>
                            </article>
                        </div>
                    @endforeach

                    <!-- start Quiz button -->
                    <div class="start_btn" style="display:none" ><button>Comenzar Quiz</button></div>

                    <!-- Info Box -->
                    <div class="info_box">
                        <div class="info-title"><span>Algunas reglas para el test</span></div>
                        <div class="info-list">
                            <div class="info">1. Tienes <span>15 segundos</span> por cada pregunta.</div>
                            <div class="info">2. Una vez seleccionada la respuesta, no puedes cambiarla</div>
                            <div class="info">3. No puedes cerrar el test mientras lo estas realizando.</div>
                            <div class="info">4. Ganarás <span>3 cromos</span> para tu album si respondes bien las preguntas.</div>
                            <div class="info">5. ¡Buena Suerte! 😎</div>
                        </div>
                        <div class="buttons">
                            <button class="quit">Cerrar Test</button>
                            <button class="restart">Continuar</button>
                        </div>
                    </div>

                    <!-- Quiz Box -->
                    <div class="quiz_box">
                        <header>
                            <div class="title">Awesome Quiz Application</div>
                            <div class="timer">
                                <div class="time_left_txt">Time Left</div>
                                <div class="timer_sec">15</div>
                            </div>
                            <div class="time_line"></div>
                        </header>
                        <section>
                            <div class="que_text">
                                <!-- Here I've inserted question from JavaScript -->
                            </div>
                            <div class="option_list">
                                <!-- Here I've inserted options from JavaScript -->
                            </div>
                        </section>

                        <!-- footer of Quiz Box -->
                        <footer>
                            <div class="total_que">
                                <!-- Here I've inserted Question Count Number from JavaScript -->
                            </div>
                            <button class="next_btn">Siguiente</button>
                        </footer>
                    </div>

                    <!-- Result Box -->
                    <div class="result_box">
                        <div class="icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="complete_text">You've completed the Quiz!</div>
                        <div class="score_text">
                            <!-- Here I've inserted Score Result from JavaScript -->
                        </div>
                        <div class="buttons">
                            <button class="restart">Replay Quiz</button>
                            <button class="quit">Quit Quiz</button>
                        </div>
                    </div>
                @else
                    <h3 id="titulos">Este Álbum no dispone de ninguna temática 😥</h3>
                </div>

            @endif

        </div>
    </section>
@endsection

@section('scripts-users')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('js/quiz.js')}}"></script>
    <script>
        let questions = [];
        $(document).ready(function(){

            $('.abrirQuiz').click( function(){

                let tematicaId = $(this).data('id');
                console.log(tematicaId);
                $('#tematica_id').val(tematicaId);

                $.ajax({
                    url: `/preguntas/${tematicaId}`,
                    success: function (respuesta){
                        if(respuesta.preguntas.length == 0){
                            Swal.fire({
                                icon: 'question',
                                title: 'Oops...',
                                text: 'Esta tematica no tiene preguntas activas!',
                            })
                        }else{
                            let questionNumber = 0;

                            questions = respuesta.preguntas?.map( pregunta => {
                                questionNumber += 1;
                                return{
                                    numb: 1,
                                    question: pregunta.enunciado,
                                    answer: pregunta.opcion_correcta,
                                    options: [
                                        pregunta.opcion_1,
                                        pregunta.opcion_2,
                                        pregunta.opcion_3,
                                        pregunta.opcion_4
                                    ]
                                }
                            } );

                            info_box.classList.add("activeInfo");
                        }

                        console.log(questions);
                    },
                });
            });
        });

    </script>
@endsection

