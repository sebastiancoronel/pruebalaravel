@extends('layouts.app')

@section('content')
<div class="container">
    <!--<a style="text-align: right;" class="btn btn-dark" href="{{ URL::previous() }}">Volver</a> -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div style="text-align: center;" class="card-header"><strong>PERSONAS POR PROVINCIA</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                   <!-- Tabla para Listar a las personas-->
                <table class="table">
                      <thead>   <!-- Columnas -->
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">DNI</th>
                          <th scope="col">Fecha Nac</th>
                          <th scope="col">Direccion</th>
                          <th scope="col">Provincia</th>
                           @guest
                          <th scope="col">Foto</th>
                          @endguest
                           <th scope="col"></th>
                          <th scope="col"></th>

                        </tr>
                      </thead>

                          <tbody>
                            @foreach($ppp as $i)             
                              <tr>
                              <th scope="row">{{$i->id}}</th>
                              <td>{{$i->apellido}}</td>
                              <td>{{$i->nombre}}</td>
                              <td>{{$i->dni}}</td>
                              <td>{{$i->fecha_nac}}</td>
                              <td>{{$i->direccion}}</td>
                              <td>{{$i->nombre_prov}}</td>
                               @guest
                              <td><img width="100%" src="{{Storage::url($i->foto)}}"></td>
                              @endguest
                              <td>
                                @auth
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
                             @endauth
                            </tr>
                             @endforeach
                          </tbody>
                    </table>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
