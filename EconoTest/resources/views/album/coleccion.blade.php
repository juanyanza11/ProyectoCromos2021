@extends('layouts.public.main')

@section('contenido')

    <section id="quiz" class="p-5">
        <div class="container">
            @if( !isset($albums) || count($albums) <= 0)
                <h3 id="titulosMitad"> No tienes ningun album asignado, realiza un test y recibe tu primer album </h3>
            @else
                <h3 class="text-center" >Mis Álbumes</h3>
                <div class="row">
                    @foreach($albums as $album)
                        @php
                            $tematicaId = $album->pivot->tematica_id;

                            $tematicaNombre = "";
                            foreach($tematicas as $tematica){

                                if($tematicaId == $tematica->id){
                                    $tematicaNombre = $tematica->nombre;
                                }
                            }
                        @endphp

                        <div class="card m-2" style="width: 22rem;">
                            <div class="card-body ">
                                <h5 class="card-title">{{$album->nombre}} </h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $tematicaNombre }}</h6>
                                <a href="{{route('album.index', ['album' => $album->pivot->tematica_id])}}" class="card-link">Ver mi Álbum</a>
                                <a href="{{route('albums.single', ['album' => $album->id])}}" class="card-link">Ir a la temática</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

@endsection
