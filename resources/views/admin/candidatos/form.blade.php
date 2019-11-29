@extends('admin.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <div class="card uper">
            <div class="card-header">
              Candidatos
            </div>
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif

              @if (session('success'))
                <div class="alert alert-success">
                  <ul>
                    <li>{{ session('success') }}</li>
                  </ul>
                </div><br />
              @endif



                  @if(isset($candidato))
                  <form action="{{ route('candidato.update', $candidato->id) }}" method="POST" class="mb-3" id="formulario" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH"  accept-charset="UTF-8">
                  @else
                  <form action="{{ route('candidato.store') }}" method="POST" class="mb-3" id="formulario" enctype="multipart/form-data">
                  @endif
                    @csrf

                    <!-- Imagen de perfil -->
                    <div class="col-12 px-0 mt-2 text-center">
                        <div class="text-muted bold text-center">Fotografia</div>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new img-thumbnail" style="max-width: 150px; max-height: 150px;">
                              @if(isset($candidato))
                                <img src="{{$candidato->image}}">
                              @else
                                <img src="{{asset('images/profile.jpg')}}">
                              @endif

                            </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                        <div>
                          <span class="btn btn-outline-secondary btn-file">
                              <span class="fileinput-new">Seleccionar fotografia</span>
                              <span class="fileinput-exists">Cambiar</span>
                              <input type="file" accept="image/*" name="image">
                          </span>
                          <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remover</a>
                        </div>
                      </div>
                    </div>



                    <div class="form-group form-row">
                      <div class="col">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required="required" value="{{old('nombre') ?? ($candidato->nombre ?? '')}}"/>
                      </div>
                      <div class="col">
                        <label for="email">Correo electronico:</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? ($candidato->user->email ?? '')}}" required autocomplete="email">
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col">
                        <label for="edad">Edad:</label>
                        <input type="number" min="18" max="100" class="form-control" id="edad" name="edad" required="required" value="{{old('edad') ?? ($candidato->edad ?? '' )}}"/>
                      </div>
                      <div class="col">
                        <label for="genero">Genero:</label>
                        <select class="form-control" name="genero" id="genero" required="required" value="{{old('genero') ?? ($candidato->genero ?? '' )}}">
                          <option value="Hombre">Hombre</option>
                          <option value="Mujer">Mujer</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group form-row">
                      <div class="col">
                        <label for="estado_id">Estado:</label>
                        <select id="estado_id" class="form-control @error('estado_id') is-invalid @enderror" name="estado_id" required autocomplete="estado_id">
                            <option value="" selected>Seleccione un estado</option>
                            @if(old('estado_id'))
                              @foreach($estados as $estado)
                                  <option value="{{$estado->id}}" {{ old('estado_id') == $estado->id ? 'selected' : ''}}>{{$estado->nombre}}</option>
                              @endforeach
                            @elseif(isset($candidato))
                              @foreach($estados as $estado)
                                <option value="{{$estado->id}}" {{ $candidato->estado_id == $estado->id ? 'selected' : ''}}>{{$estado->nombre}}</option>
                              @endforeach
                            @else
                              @foreach($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                              @endforeach
                            @endif
                        </select>
                      </div>
                      <div class="col">
                        <label for="ciudad_id">Ciudad:</label>
                        <select id="ciudad_id" class="form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" required autocomplete="ciudad_id">
                            <option value="" selected>Seleccione una ciudad</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group form-row">
                      <div class="col">
                        <label for="estado_civil">Estado Civil:</label>
                        <input type="text" class="form-control" id="estado_civil" name="estado_civil" required="required" value="{{old('estado_civil') ?? ($candidato->estado_civil ?? '')}}"/>
                      </div>
                      <div class="col">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" required="required" value="{{old('telefono') ?? ($candidato->telefono ?? '')}}"/>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion_personal">Descripción personal:</label>
                        <textarea class="form-control @error('descripcion_personal') is-invalid @enderror" name="descripcion_personal" id="descripcion_personal" rows="3" required="required">{{old('descripcion_personal') ?? ($candidato->descripcion_personal ?? '')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="descripcion_profesional">Descripción profesional:</label>
                        <textarea class="form-control @error('descripcion_profesional') is-invalid @enderror" name="descripcion_profesional" id="descripcion_profesional" rows="3" required="required">{{old('descripcion_profesional') ?? ($candidato->descripcion_profesional ?? '')}}</textarea>
                    </div>

                    <div class="form-group form-row">
                      <div class="col">
                        <label for="password">Contraseña: (Min 8 caracteres)</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" {{ !(isset($candidato)) ? 'required' : ''}} autocomplete="new-password">
                      </div>
                      <div class="col">
                        <label for="password-confirm">Confirmar Contraseña:</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" {{ !(isset($candidato)) ? 'required' : ''}} autocomplete="new-password">
                      </div>
                    </div>
                    @if(isset($candidato))
                    <label style="font-size: small; color: red;">* Escriba una contraseña SOLO si desea cambiarla</label>
                    @endif

                </form>
                  @if(isset($candidato))
                    <button type="submit" form="formulario" class="btn btn-success" form="formulario">Actualizar</button>
                  @else
                    <button type="submit" class="btn btn-success" form="formulario">Registrar Candidato</button>
                  @endif                  
                  <a href="{{ route('candidato.index') }}" class="btn btn-danger">Regresar</a>
                  @if(isset($candidato))
                    <form action="{{ route('candidato.destroy', $candidato->id)}}" method="post" class="mt-3">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Borrar</button>
                    </form>
                  @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

              
@section('styles')
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
@endsection

@section('scripts')
   <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
   <script type="text/javascript">
        //Si la validacion retorna la vista, recuperamos el valor anterior de la ciudad
        $(document).ready(function(){

            var estadoOld = "<?php echo old('estado_id') ?? ( isset($candidato) ? $candidato->estado_id : '') ?>";
            var ciudadOld = "<?php echo old('ciudad_id') ?? ( isset($candidato) ? $candidato->ciudad_id : '') ?>";

            if(estadoOld)
            {
                $.get('/api/ciudades/' + estadoOld , function(data){
                    var opciones = '<option value="">Seleccione una ciudad</option>';
                    for(var i = 0; i < data.length; ++i)
                        opciones += '<option value="' + data[i].id + '"' + (ciudadOld == data[i].id ? 'selected' : '') + '>' + data[i].nombre + '</option>';    
                    $('#ciudad_id').html(opciones);                
                });
            }
        });

        //Funcion para el cambio de estado en el select
        $(function(){
            $('#estado_id').on('change', cargarCiudades);
        });
        function cargarCiudades() {
            var estado_id = $(this).val();
            if(!estado_id)
            {
                $('#ciudad_id').html('<option value="">Seleccione una ciudad</option>');
                return;
            }
            $.get('/api/ciudades/' + estado_id , function(data){
                var opciones = '<option value="">Seleccione una ciudad</option>';
                for(var i = 0; i < data.length; ++i)
                    opciones += '<option value="' + data[i].id + '" >' + data[i].nombre + '</option>';
                $('#ciudad_id').html(opciones);                
            });
        };
   </script>
@endsection