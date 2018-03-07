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
                <div class="card-header"><strong>MODIFICAR PROVINCIA</strong></div>

                <div class="card-body">
                              
                    <form method="POST" action="{{action('ProvinciaController@update',$id)}}">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="PATCH">
                   
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $provincia->nombre }}" >

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      <div class="row">
                        <div class="col-md-4"><a class="btn btn-dark" href="{{ URL::previous() }}">Volver</a></div>
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

