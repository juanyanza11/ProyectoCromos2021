@extends('usuario.mainUser')


@section('contenido')
    <section class="section-md-75 ">
        <div class="container">
            <p>Desde album</p>
            @if($album->user_id === auth()->user()->id )
                <h2>Cromos que este usuario gano y no estan en el album</h2>
                <div class="cromos_ganados">
                    @foreach($cromosGanados as $cromo)
                        {{$cromo->album->user}}
                        <div class="fill" draggable="true" style="background-image:url('{{asset("/img/cromos/{$cromo->cromo->imagen}")}}');position: relative; height: 150px; width: 150px;cursor: pointer; " ></div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>


@endsection

