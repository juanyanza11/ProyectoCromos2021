@extends('usuario.mainUser')



@section('coleccionMenu')

@endsection

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
            @if($mostrarAlerta)
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                @if($paso)
                    <script type="application/javascript">
                        Swal.fire({
                            title: 'Pasaste el Quiz',
                            html: `
                                <p>Acertaste {{$correctas}} preguntas de {{$total_preguntas}} totales</p>
                                <p>Obtuviste 3 cromos para tu album</p>
                            `,
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ir a mi Album',
                            cancelButtonText: 'Volver a las temáticas'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace('/album/{{$newAlbumId}}');
                            }else{
                                window.location.replace('/home');
                            }
                        })
                    </script>
                @else
                    <script type="application/javascript" >
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Lo sentimos no pasaste el examen',
                        }).then(res =>{
                            window.location.replace('/home');
                        });


                    </script>
                @endif


            @endif
        </div>

        <style>
            .swal2-popup{
                font-size: 1.6rem !important;
            }
        </style>


@endsection
