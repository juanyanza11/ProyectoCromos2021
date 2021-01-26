{{--@extends('usuario.mainUser')--}}
@extends('layouts.public.main')

@section('styles-users')

@endsection

@section('contenido')
    <section class="p-5 section-50 " >
        <div class="container">
            <h3 class="text-center" >Tu información de perfil</h3>
            <form class="row">
                <div class="col-4">
                    <img src="{{asset('img/cromos/017correa.jpg')}}"  class="rounded-lg mx-auto d-block" alt="">
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" placeholder="Tu nombre" value= {{ auth()->user()->name }}>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" placeholder="Tu email" value= {{ auth()->user()->email }}>
                    </div>
                    <div class="form-group">
                        <label for="">Pais</label>
                        <input type="text" class="form-control" placeholder="Tu pais" value= {{ auth()->user()->pais }}>
                    </div>
                    <div class="form-group">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" placeholder="Tu ciudad" value= {{ auth()->user()->ciudad }}>
                    </div>
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <input type="text" class="form-control" placeholder="Tu descripcion" value= {{ auth()->user()->descripcion }}>
                    </div>
                    <input type="submit"  class="btn btn-primary" value="Actualizar Perfil" >
                </div>
            </form>
        </div>
    </section>

@endsection


@section('scripts-users')

@endsection

