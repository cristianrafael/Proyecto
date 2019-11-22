@extends('layouts.app')

@section('content')
<div class="container pb-5 pt-5">
    <div class="row justify-content-center pb-5 pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrate') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

                            <div class="col-md-6">
                                <input id="edad" type="number" min="18" max="100" class="form-control @error('edad') is-invalid @enderror" name="edad" value="{{ old('edad') }}" required autocomplete="edad">

                                @error('edad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Genero') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                  <input class="form-check-input" type="radio" name="genero" id="genero-hombre" value="Hombre" {{ old('genero')=="Hombre" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                  <label class="form-check-label" for="genero-hombre">
                                    Hombre
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <input class="form-check-input" type="radio" name="genero" id="genero-mujer" value="Mujer" {{ old('genero')=="Mujer" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                  <label class="form-check-label" for="genero-mujer">
                                    Mujer
                                  </label>
                                </div>

                                @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <select id="estado" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ old('estado') }}" required autocomplete="estado">
                                    <option value="" selected>Seleccione un estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}" {{ old('estado') == $estado->id ? 'selected' : ''}}>{{$estado->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <select id="ciudad" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" required autocomplete="ciudad">
                                    <option value="" selected>Seleccione una ciudad</option>
                                </select>                               
                                @error('ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
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

@section('scripts')
   <script type="text/javascript">
        //Si la validacion retorna la vista, recuperamos el valor anterior de la ciudad
        $(document).ready(function(){

            var estadoOld = "{{ old('estado')}}";
            var ciudadOld = "{{ old('ciudad')}}";

            if(estadoOld)
            {
                $.get('/api/ciudades/' + estadoOld , function(data){
                    var opciones = '<option value="">Seleccione una ciudad</option>';
                    for(var i = 0; i < data.length; ++i)
                        opciones += '<option value="' + data[i].id + '"' + (ciudadOld == data[i].id ? 'selected' : '') + '>' + data[i].nombre + '</option>';    
                    $('#ciudad').html(opciones);                
                });
            }
        });

        //Funcion para el cambio de estado en el select
        $(function(){
            $('#estado').on('change', cargarCiudades);
        });
        function cargarCiudades() {
            var estado_id = $(this).val();
            if(!estado_id)
            {
                $('#ciudad').html('<option value="">Seleccione una ciudad</option>');
                return;
            }
            $.get('/api/ciudades/' + estado_id , function(data){
                var opciones = '<option value="">Seleccione una ciudad</option>';
                for(var i = 0; i < data.length; ++i)
                    opciones += '<option value="' + data[i].id + '" >' + data[i].nombre + '</option>';
                $('#ciudad').html(opciones);                
            });
        };
   </script>
@endsection