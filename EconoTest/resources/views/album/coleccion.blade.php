{{--@extends('usuario.mainUser')--}}
@extends('layouts.public.main')

@section('contenido')
    <section class="section-md-75 ">
        <div class="container" style="min-height: 300px" >
            @if( !isset($albums) || count($albums) <= 0)
                <h3 class="text-center font-weight-normal" > No tienes ningun album asignado, realiza un test y recibe tu primer album </h3>
            @else
                <h3 class="text-center" >Mis Albunes</h3>
                <div class="row">
                    @foreach($albums as $album)
                        <div class="card m-2" style="width: 22rem;">
                            <div class="card-body ">
                                <h5 class="card-title">{{$album->albumsTematica->album->nombre}} - {{$album->albumsTematica->tematica->nombre}} </h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$album->albumsTematica->tematica->nombre}}</h6>
                                <a href="{{route('album.index', ['album' => $album->id])}}" class="card-link">Ver mi album</a>
                                <a href="{{route('home')}}" class="card-link">Ir a la tematica</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>


@endsection
