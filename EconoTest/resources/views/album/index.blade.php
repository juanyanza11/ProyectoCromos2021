@extends('usuario.mainUser')


@section('contenido')
    <section class="section-md-75 ">
        <div class="container">
            @if($album->user_id === auth()->user()->id )
                <div class="cromos_ganados">
                    @foreach($cromosGanados as $cromo)
                        {{$cromo->cromo}}
                        <div class="fill" draggable="true" style="background-image:url('{{$cromo->cromo->imagen}}');position: relative; height: 150px; width: 150px;cursor: pointer; background-color:red;" ></div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>


@endsection

