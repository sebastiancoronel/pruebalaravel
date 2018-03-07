@extends('layouts.app')

@section('content')
   
<div class="">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>NUEVA PROVINCIA</strong></div>

                <div class="card-body">
                    <!--Mostrar Mensaje de persona almacenada correctamente-->
                    @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <!-- Fin de mensaje-->

                    <form method="POST" enctype="multipart/form-data" action="{{ route('provincia.store') }}"> 
                      <!-- Cuando envie el formulario Laravel va a sustituirlo por la URL correspondiente-->
                      <!-- enctype="multipart/form-data" permite subir archivos
                        accept="image/*" Acepta todo formato de imagen, tambien lo valida Laravel en el PersonaController-->
                        @csrf 

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre de la provincia</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}"  autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-dark" href="{{url('/home')}}">Volver</a>
                                <button type="submit" class="btn btn-primary">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </form>
@endsection