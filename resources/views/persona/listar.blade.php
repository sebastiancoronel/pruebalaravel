@extends('layouts.app')

@section('content')
<div class="container">
<a style="text-align: right;" class="btn btn-dark" href="{{url('/home')}}">Volver</a>
<!-- SELECCIONAR PROVINCIAS ("Filtrado") -->
<div class="card-header"><strong>FILTRAR POR PROVINCIA</strong></div>
@foreach($listaprovincias as $i)
<a class="btn btn-light" href="{{action('ProvinciaController@show',$i['id'])}}"> {{$i->nombre_prov}} </a>
@endforeach
<!-- FIN SELECCIONAR PROVINCIAS -->

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <!--Mostrar Mensaje de persona almacenada correctamente-->
                    @if(Session::has('message'))
                    <div class="alert alert-danger">{{Session::get('message')}}</div>
                    @endif
                    <!-- Fin de mensaje-->

                    <!--Mostrar Mensaje de persona actualizada correctamente-->
                    @if(Session::has('message_persona'))
                    <div class="alert alert-success">{{Session::get('message_persona')}}</div>
                    @endif
                    <!-- Fin de mensaje-->
                <div class="card-header"><strong>LISTADO DE PERSONAS</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                </div>
                <!-- Tabla para Listar a las personas-->
                <table class="table">
                      <thead>   <!-- Columnas -->
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">DNI</th>
                          <th scope="col">Fecha de Nacimiento</th>
                          <th scope="col">Direccion</th>
                          <th scope="col">Provincia</th>
                           <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>

                          <tbody>
                            @foreach($listapersonas as $i)             
                              <tr>
                              <th scope="row">{{$i->id}}</th>
                              <td>{{$i->apellido}}</td>
                              <td>{{$i->nombre}}</td>
                              <td>{{$i->dni}}</td>
                              <td>{{$i->fecha_nac}}</td>
                              <td>{{$i->direccion}}</td>
                              <td>{{$i->nombre_prov}}</td>
                              <td>
                                <!--MOSTRAR-->
                                <a class="btn btn-primary" href="{{action('PersonaController@show',$i['id'])}}">VER</a>
                              </td>
                              <td>
                                <!--ELIMINAR-->
                                <form action="{{action('PersonaController@destroy', $i['id'])}}" method="post">
                                  {{csrf_field()}}
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button class="btn btn-danger" type="submit">ELIMINAR</button>
                                </form>
                             </td>
                            </tr>
                             @endforeach
                          </tbody>
                    </table>

                   

                <div style="text-align: right;" >
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
