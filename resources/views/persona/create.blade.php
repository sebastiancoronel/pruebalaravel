@extends('layouts.app')

@section('content')


  
<div class="container">
    <!-- Lo iba a usar para obtener el ID asi solo tener que elegir del select y no escribir nada -->
      <script> 
          $(function(){
            $('#selectprovincia').on('change',onProvinciaElegida);
            function onProvinciaElegida(){
                var provincia_id = $(this).val();
                
            }
          });
     </script>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">NUEVA PERSONA</div>

                <div class="card-body">
                    <!--Mostrar Mensaje de persona almacenada correctamente-->
                    @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <!-- Fin de mensaje-->

                    <form method="POST" enctype="multipart/form-data" accept-charset="UTF-8" class="form-horizontal" action="{{ route('persona.store') }}"> 
                      <!-- Cuando envie el formulario Laravel va a sustituirlo por la URL correspondiente-->
                      <!-- enctype="multipart/form-data" permite subir archivos
                        accept="image/*" Acepta todo formato de imagen, tambien lo valida Laravel en el PersonaController-->
                        @csrf 

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ old('apellido') }}"  autofocus>

                                @if ($errors->has('apellido'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre </label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" >

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">DNI</label>

                            <div class="col-md-6">
                                <input id="dni" type="integer" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" maxlength="8" pattern="[0-9]+" placeholder="solo números">
                                @if ($errors->has('dni'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control{{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" name="fecha_nac" >
                                @if ($errors->has('fecha_nac'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fecha_nac') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" >
                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="provincia_id" class="col-md-4 col-form-label text-md-right">Provincia</label>
                            
                              
                            <div class="col-md-6">
                                <input id="provincia_id" type="text" class="form-control{{ $errors->has('provincia_id') ? ' is-invalid' : '' }}" name="provincia_id" placeholder="Ingrese solo el ID">
                                @if ($errors->has('provincia_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('provincia_id') }}</strong>
                                    </span>
                                @endif
                            </div> 
                            <strong class="col-md-3" >CONSULTAR ID</strong>
                            <br>
                            <!-- SELECCIONAR PROVINCIAS -->
                            <select id="selectprovincia" class="js-example-basic-single col-md-6" name="active">
                                @foreach($listaprovincias as $i)  
                                <option value="{{$i->id}}" type="text" name="provincia_id"> {{$i->nombre_prov}} -> ID {{$i->id}} </option>
                                @endforeach
                            </select>   

                            
                            
                        </div>

                        <!--SUBIR IMAGEN NUEVO-->
                        <div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
                            <label for="foto" class="col-md-4 control-label">Foto</label>
                            <div class="col-md-6">
                                <input class="form-control" name="foto" type="file" accept=".jpg, .gif, .png, .jpeg" id="foto" value="{{''}}" required>
                                {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>


                        <!-- SUBIR IMAGEN FORMA ANTIGUA
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" >
                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-dark" href="{{url('/home')}}">Volver</a>
                                <button type="submit" class="btn btn-primary">
                                    Aceptar
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

