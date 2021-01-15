@extends('usuario.mainUser')

@section('coleccionMenu')


@endsection

@section('contenido')
    <section id="quiz" class="section-md-75 ">
        <div class="container">
            <div class="row row-40">
                @foreach($tematicas as $tematica)
                    <div class="col-md-6 col-lg-4 height-fill">
                        <article class="icon-box1">
                            <a href="{{ route('preguntas.usuario.index', ['id' => $tematica->id])  }}">
                                <div class="box-top">
                                    <div class="box-icon1"><img src="images/beneficios1.jfif" alt="" width="300" height="300"/></div>
                                    <div class="box-header">
                                        <h5><a href="#"></a></h5>
                                    </div>
                                </div>
                                <div class="divider bg-accent"></div>
                                <div class="box-body">
                                    <h5>{{ $tematica->nombre }}</h5>
                                </div>
                            </a>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
