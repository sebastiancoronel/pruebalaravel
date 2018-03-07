@extends('layouts.app')

@section('content')
   
<div class="container">
     <script type="text/javascript">
        $(document).ready(function() {
        $('.js-example-basic-single').select2();});
    </script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>MODIFICAR PERSONA</strong></div>

                <div class="card-body">
                              
                    <form method="POST" enctype="multipart/form-data" accept-charset="UTF-8" class="form-horizontal" action="{{action('PersonaController@update',$id)}}">
                      @csrf
                      <input name="_method" type="hidden" value="PATCH">
                      <!-- Apellido -->
                      <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido </label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" required class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ $persona->apellido }}" >

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
                                <input id="nombre" type="text" required class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $persona->nombre }}" >

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
                                <input id="dni" type="integer" required class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" maxlength="8" pattern="[0-9]+" value="{{$persona->dni}}">
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
                                <input id="fecha_nac" type="date" required class="form-control{{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" name="fecha_nac" value="{{$persona->fecha_nac}}" >
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
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" required value="{{$persona->direccion}}" >
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
                                <input id="provincia_id" type="text" class="form-control{{ $errors->has('provincia_id') ? ' is-invalid' : '' }}" name="provincia_id" placeholder="Ingrese solo el ID" required>
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
                                @if($persona->foto)
                                   <img width="20%" src="{{Storage::url($persona->foto)}}">
                                @endif
                                <div class="col-md-6">
                                    <input class="form-control" name="foto" type="file" accept=".jpg, .gif, .png, .jpeg" id="foto" value="{{''}}" required>
                                    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>


                      <div class="row">
                        <!-- <div class="col-md-4"> <a class="btn btn-dark" href="{{ URL::previous() }}"></a></div>-->
                        <div class="form-group col-md-4">
                          <button type="submit" class="btn btn-success" style="margin-left:38px">MODIFICAR</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


 