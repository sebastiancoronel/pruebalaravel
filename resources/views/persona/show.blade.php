@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $persona->nombre }} {{$persona->apellido}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <strong>DNI: </strong> {{$persona->dni}}
                    <br>
                    <br>
                    <strong>FECHA DE NACIMIENTO:</strong> {{$persona->fecha_nac}}
                    <br>
                    <br>
                    <strong>DIRECCION:</strong> {{$persona->direccion}}
                    <br>
                    <br>
                    <strong>PROVINCIA:</strong> {{$persona->nombre_prov}}
                    <br>
                    <br>
                    <strong>FOTO:</strong> <span></span>
                    <img width="50%" src="{{Storage::url($persona->foto)}}">

                </div>
                <div style="text-align: right;" >
                     <a class="btn btn-dark" href="{{ URL::previous() }}">Volver</a>
                    <a type="submit" class="btn btn-primary" href="{{action('PersonaController@edit',$persona['id'])}}">Editar</a> <!-- Dirige al form de la persona con el ID-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

