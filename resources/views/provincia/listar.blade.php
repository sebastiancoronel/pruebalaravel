@extends('layouts.app')

@section('content')
<div class="container">

  <!--Mostrar Mensaje de provincia eliminada-->
    @if(Session::has('message'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
    @endif
  <!-- Fin de mensaje de provincia eliminada-->

  <!--Mostrar Mensaje de provincia actualizada-->
    @if(Session::has('message_provincia'))
    <div class="alert alert-success">{{Session::get('message_provincia')}}</div>
    @endif
  <!-- Fin de mensaje de provincia actualizada-->
@guest
<a style="text-align: right;" class="btn btn-dark" href="{{url('/')}}">Volver</a>
@endguest
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><strong>LISTADO DE PERSONAS POR PROVINCIAS</strong>
                  @auth
                  <div style="text-align: right;"> <a class="btn btn-dark" href="{{url('/home')}}">Volver</a>
                  </div>
                  @endauth
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                </div>
                <!-- Tabla para Listar a las provincias-->
                <table class="table">
                      <thead>   <!-- Columnas -->
                        <tr>
                          <th scope="col">VER PERSONAS DE</th>
                        </tr>
                      </thead>

                          <tbody>
                            @foreach($listaprovincias as $i)
                              <tr>
                              <td>
                                <!-- VER PERSONA POR PROVINCIA -->
                                <a style="width: 100%;" class="btn btn-primary" href="{{action('ProvinciaController@show',$i['id'])}}"> {{$i->nombre}}</a>
                              </td>
                              <td></td>
                              @if (Route::has('login'))
                                @auth
                              <td>
                                <!--MODIFICAR-->
                                <a class="btn btn-dark" href="{{action('ProvinciaController@edit',$i['id'])}}">MODIFICAR</a></td>
                              <td>
                              <!--ELIMINAR-->
                                <form action="{{action('ProvinciaController@destroy', $i['id'])}}" method="post">
                                  {{csrf_field()}}
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button class="btn btn-danger" type="submit">ELIMINAR</button>
                                </form>
                                @endauth
                                @endif
                              </td>
                              </tr>
                             @endforeach
                          </tbody>
                    </table>

                   

                
            </div>
        </div>
    </div>
</div>
@endsection
