{{--@extends('usuario.mainUser')--}}
@extends('layouts.public.main')


@section('styles-users')

@endsection

@section('contenido')
    <section id="quiz" class="p-5">
        <div class="container">
            <div class="row row-40">
                <input type="hidden" id="token_consulta" value="{{ csrf_token()}}" >
                <input type="hidden" id="user_id" value="{{ auth()->user()->id}}" >
                @foreach($albums as $album)
                    <div class="col-md-6 col-lg-4 height-fill">
                        <a href="{{ route('albums.single', ['album' => $album->id]) }}">
                            <article class="icon-box1 abrirQuiz" data-id="{{$album->id}}">
                                <div class="box-top">
                                    <div class="box-icon"><img id="imgSombra" src='{{asset("/img/albunes/{$album->imagen}")}}' alt="" width="210" height="120"/></div>
                                    <div class="box-header">
                                        <h5 id="tituloAlbum"><a href="#"></a></h5>
                                    </div>
                                </div>
                                <div class="divider bg-accent"></div>
                                <div class="box-body">
                                    <h5>{{ $album->nombre }}</h5>
                                </div>
                            </article>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('scripts-users')

@endsection

