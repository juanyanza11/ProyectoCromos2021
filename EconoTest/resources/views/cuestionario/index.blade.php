{{--@extends('usuario.mainUser')--}}
@extends('layouts.public.main')

@section('styles-users')
    <link rel="stylesheet" href="{{ asset('css/quiz.css')  }}">
@endsection

@section('contenido')
    <section class="section-120">
        <div class="container" style="min-height: 340px" >

                <!-- start Quiz button -->
                <div class="start_btn"><button>Comenzar Quiz</button></div>

                <!-- Info Box -->
                <div class="info_box">
                    <div class="info-title"><span>Some Rules of this Quiz</span></div>
                    <div class="info-list">
                        <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
                        <div class="info">2. Once you select your answer, it can't be undone.</div>
                        <div class="info">3. You can't select any option once time goes off.</div>
                        <div class="info">4. You can't exit from the Quiz while you're playing.</div>
                        <div class="info">5. You'll get points on the basis of your correct answers.</div>
                    </div>
                    <div class="buttons">
                        <button class="quit">Exit Quiz</button>
                        <button class="restart">Continue</button>
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
                        <button class="next_btn">Next Que</button>
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

            <div class="row d-none">
                <div class="col">
                    <form  action=" {{route('preguntas.usuario.quiz')}} "  method="POST">
                        @csrf
                        <input type="hidden" name="tematica_id" value="{{$tematica_id}}" >
                        @foreach($preguntas as $pregunta)
                            <h4>{{$pregunta->enunciado}}</h4>
                            <input type="hidden"  class="respuesta_correcta" name="pregunta_{{$pregunta->id}}_response"   value="{{$pregunta->opcion_correcta}}">
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_{{$pregunta->id}}"  value="{{$pregunta->opcion_1}}" >
                                <label class="form-check-label">
                                    {{$pregunta->opcion_1}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_{{$pregunta->id}}"   value="{{$pregunta->opcion_2}}">
                                <label class="form-check-label">
                                    {{$pregunta->opcion_2}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_{{$pregunta->id}}"  value="{{$pregunta->opcion_3}}">
                                <label class="form-check-label">
                                    {{$pregunta->opcion_3}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input respuesta_elegida" type="radio" name="pregunta_{{$pregunta->id}}"   value="{{$pregunta->opcion_4}}">
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
    </section>
@endsection


@section('scripts-users')
    <script src="{{asset('js/quiz.js')}}"></script>
    <script>
        const preguntas = {!! json_encode($preguntas) !!};
        let questionNumber = 0;
        const questions = preguntas?.map( pregunta => {
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
        // creating an array and passing the number, questions, options, and answers
        let questionsold = [
            {
                numb: 1,
                question: "Pregunta 1",
                answer: "Hyper Text Markup Language",
                options: [
                    "Hyper Text Preprocessor",
                    "Hyper Text Markup Language",
                    "Hyper Text Multiple Language",
                    "Hyper Tool Multi Language"
                ]
            },
            {
                numb: 2,
                question: "What does CSS stand for?",
                answer: "Cascading Style Sheet",
                options: [
                    "Common Style Sheet",
                    "Colorful Style Sheet",
                    "Computer Style Sheet",
                    "Cascading Style Sheet"
                ]
            },
            {
                numb: 3,
                question: "What does PHP stand for?",
                answer: "Hypertext Preprocessor",
                options: [
                    "Hypertext Preprocessor",
                    "Hypertext Programming",
                    "Hypertext Preprogramming",
                    "Hometext Preprocessor"
                ]
            },
            {
                numb: 4,
                question: "What does SQL stand for?",
                answer: "Structured Query Language",
                options: [
                    "Stylish Question Language",
                    "Stylesheet Query Language",
                    "Statement Question Language",
                    "Structured Query Language"
                ]
            },
            {
                numb: 5,
                question: "What does XML stand for?",
                answer: "eXtensible Markup Language",
                options: [
                    "eXtensible Markup Language",
                    "eXecutable Multiple Language",
                    "eXTra Multi-Program Language",
                    "eXamine Multiple Language"
                ]
            },
            // you can uncomment the below codes and make duplicate as more as you want to add question
            // but remember you need to give the numb value serialize like 1,2,3,5,6,7,8,9.....

            //   {
            //   numb: 6,
            //   question: "Your Question is Here",
            //   answer: "Correct answer of the question is here",
            //   options: [
            //     "Option 1",
            //     "option 2",
            //     "option 3",
            //     "option 4"
            //   ]
            // },
        ];

    </script>
@endsection
