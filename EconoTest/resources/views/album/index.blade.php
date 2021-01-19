{{--@extends('usuario.mainUser')--}}
@extends('layouts.public.main')

@section('styles-users')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <style>
        .cromos_ganados .owl-stage-outer{
            overflow: hidden;
        }
        .cromos_ganados .owl-stage{
            display: flex;
            width: 100% !important;
        }
        .cromos_ganados .owl-nav{

        }
        .owl-stage{
            background: #e1e1e1;
            border: 5px salmon solid;
            border-radius: 10px;
        }
        .owl-prev, .owl-next{
            position: relative;
            margin: 10px;
        }
        .cromos_ganados .owl-nav{
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 10px;
        }
        .cromos_ganados .owl-nav span{
            display: none !important;
        }
        .cromos_ganados .owl-dots{
            display: none !important;
        }
        .botomes{
            display: flex;
            justify-content: center;
        }
        .botomes button{
            margin: 15px;
        }
        .fill{
            position: relative;
            height: 150px;
            width: 150px;
            cursor: pointer;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px;
        }
        .cromos-listos{
            position: relative;
            height: 165px;
            width: 165px;
            cursor: pointer;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px;
        }
        .listado-cromos{
            display: flex;
            flex-wrap: wrap;
            background-color: #e1e1e1; 
            border-radius: 20px; 
            padding: 15px
        }
        .vacio{
            height: 160px;
            width: 160px;
            margin: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .vacio.filtro{
            filter: grayscale(100%) blur(2px);
            background-size: cover;
            background-repeat: no-repeat;
            height: 165px;
            width: 165px;
            margin: 10px;
            display: block;
        }

        .hold{
            border: solid gray 4px;
        }

        .hovered{
            filter: none;
        }
        .invisible{
            display: none;
        }
        .progress-bar{
            background: #f15f0d;
        }
    </style>
@endsection

@section('contenido')
    <section class="section-md-75 "  style="min-height: 300px">
        <div class="container">
            <div class="row d-flex justify-content-center m-5">
                <div class="col-8 ">
                    @php
                        $total = 0;
                        foreach ($cromosGanadosColocados as $cromo) {
                            if($cromo->cromosTematica->tematica_id === $tematica_id){
                                $total++;
                            }
                        }

                        $percentage = ($total  * 100) / count($cromos);
                    @endphp
                    <h5 class="text-center" > {{$total}} / {{count($cromos)}} cromos</h5>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage}}%" aria-valuenow="{{$total}}" aria-valuemin="0" aria-valuemax="{{count($cromos)}}"></div>
                    </div>
                </div>
            </div>
            @if(count($cromosGanadosSinColocar) > 0)
                <h4 class="text-center" >ARRASTRA TUS CROMOS AL ÁLBUM</h4>
                <div class="cromos_ganados">
                        @foreach($cromosGanadosSinColocar as $cromo)
                            @if($cromo->cromosTematica->tematica_id === $tematica_id)
                                <div class="vacio">
                                    <div class="fill" data-cromo-id="{{$cromo->cromosTematica->id}}"  data-edit="{{$cromo->id}}"  data-id="{{$cromo->cromosTematica->id}}" draggable="true" style="background-image:url('{{asset("/img/cromos/{$cromo->cromosTematica->cromo->imagen}")}}');position: relative; height: 150px; width: 150px;cursor: pointer; " ></div>
                                </div>
                            @endif
                        @endforeach
                </div>
            @else
                
                <h4 class="text-center" >No tienes más cromos disponibles 😢</h4>
            @endif
           
            @if(count($cromos) > 0)
                <h4 class="text-center" >Listado de cromos del album</h4>
                <div class="listado-cromos">
                    @foreach($cromos as $cromo)
                        <div class="vacio filtro" >
                            <div class="cromos-listos"  data-cromo-id="{{$cromo->id}}"   style="background-image:url('{{asset("/img/cromos/{$cromo->cromo->imagen}")}}');position: relative; " ></div>
                        </div>
                    @endforeach
                </div>
            @else
                <h5 class="text-center" >Este album aun no tiene cromos activos 😢</h5>
            @endif

        </div>
    </section>


@endsection

@section('scripts-users')
    <script src="{{asset('js/owl.carousel.min.js')}}" ></script>
    <script >
        $(document).ready(function(){
            let cromosGanados = {!! $cromosGanadosSinColocar !!};
            let cromosGanadosColocados = {!! $cromosGanadosColocados !!}
            console.log(cromosGanados);
            $('.cromos_ganados').owlCarousel({
                mouseDrag: false,
                items: 5
            });
            if(Object.keys(cromosGanados).length >= 7){
                $('.cromos_ganados .owl-nav').css({
                    display: 'flex'
                });
            }else{
                $('.cromos_ganados .owl-nav').css({
                    display: 'none'
                });
            }

            let todoslosCromos = $('.cromos-listos');
            for(const cromo of todoslosCromos){
                const idCromo = cromo.dataset.cromoId;
                
                Object.keys(cromosGanadosColocados).map(key => {
                    let cromoGanado = cromosGanadosColocados[key];

                    if(idCromo == cromoGanado.cromos_tematica_id){
                        cromo.parentElement.style.filter = "grayScale(0%)";
                    }
                })
            }
        });
        let fills = document.querySelectorAll('.fill');
        let vacios = document.querySelectorAll('.vacio');

        let idCromoParaPonerlo = null;
        let idCromoActualizar = null;
        let idUserCromoTemtica = null;
        let elementoBorrar = null;

        // Fill listener
        for(const fill of fills){
            fill.addEventListener('dragstart', dragStart);
            fill.addEventListener('dragend', dragEnd);
        }

        for(const vacio of vacios){
            vacio.addEventListener('dragover', dragOver);
            vacio.addEventListener('dragenter', dragEnter);
            vacio.addEventListener('dragleave', dragLeave);
            vacio.addEventListener('drop', drop);
        }

        function  dragStart(e){
            idCromoParaPonerlo = e.target.dataset.cromoId;
            idCromoActualizar = e.target.dataset.id;
            idUserCromoTemtica =  e.target.dataset.edit;
            elementoBorrar = e.target.parentElement;
            console.log("start");
        }

        function dragEnd(){
            this.className = 'fill';
        }

        function dragOver(e){
            e.preventDefault();
        }

        function dragEnter(e){
            e.preventDefault();
        }

        function dragLeave(e){
        }

        function drop(e){
            let cromoId = e.target.dataset.cromoId;

            let url = `${window.location.origin}/api/update/cromo`;
            if(cromoId == idCromoParaPonerlo){
                $.ajax({
                    method: 'POST',
                    url,
                    data: {
                        cromoId :idUserCromoTemtica
                    },
                    dataType: "json",
                    success: function(response){
                        console.log("Response", response);
                        if(response.update){
                            elementoBorrar.parentElement.removeChild(elementoBorrar);
                            e.target.parentElement.style.filter = "grayScale(0%)"
                        }
                    }

                })
            }else{
                console.log("no es igual")
            }



            console.log("drop");
        }

    </script>
@endsection
