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
              Vacantes
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

                  @if(isset($vacante))
                  <form action="{{ route('vacante.update', $vacante->id) }}" method="POST" class="mb-3" id="formulario">
                    <input type="hidden" name="_method" value="PATCH"  accept-charset="UTF-8">
                  @else
                  <form action="{{ route('vacante.store') }}" method="POST" class="mb-3" id="formulario">
                  @endif
                    @csrf

                    <div class="form-group">
                      <label for="titulo">Titulo de la vacante:</label>
                      <input type="text" class="form-control" id="titulo" name="titulo" required="required" value="{{old('titulo') ?? ($vacante->titulo ?? '')}}"/>
                    </div>


                    <div class="form-group form-row">
                      <div class="col">
                        <label for="sueldo">Sueldo:</label>
                        <input id="sueldo" type="sueldo" class="form-control @error('sueldo') is-invalid @enderror" name="sueldo" value="{{ old('sueldo') ?? ($vacante->sueldo ?? '')}}" required autocomplete="sueldo">
                      </div>                
                      <div class="col">
                        <label for="ubicacion">Ubicación:</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" required="required" value="{{old('ubicacion') ?? ($vacante->ubicacion ?? '' )}}"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="descripcion_puesto">Descripción del puesto:</label>
                      <textarea class="form-control @error('descripcion_puesto') is-invalid @enderror" name="descripcion_puesto" id="descripcion_puesto" rows="3" required="required">{{old('descripcion_puesto') ?? ($vacante->descripcion_puesto ?? '')}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="no_vacantes">Numero de vacantes:</label>
                      <input type="number" min="1" class="form-control" id="no_vacantes" name="no_vacantes" required="required" value="{{old('no_vacantes') ?? ($vacante->no_vacantes ?? '' )}}"/>
                    </div>

                    <div class="form-group form-row">
                      <div class="col">
                        <label for="horario">Horario:</label>
                        <input id="horario" type="text" class="form-control @error('horario') is-invalid @enderror" name="horario" value="{{old('horario') ?? ($vacante->horario ?? '')}}" required>
                      </div>
                      <div class="col">
                        <label for="experiencia">Experiencia requerida:</label>
                        <input id="experiencia" type="text" class="form-control @error('experiencia') is-invalid @enderror" name="experiencia" value="{{old('experiencia') ?? ($vacante->experiencia ?? '')}}" required>
                      </div>
                    </div>
                  
                  <div class="form-check">
                    <label class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dis_viajar" value="1" {{old('dis_viajar') ? 'checked' : (isset($vacante->dis_viajar) ? ($vacante->dis_viajar ? 'checked' : '') : '')}}> Disponibilidad para viajar
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dis_reubicarse" value="1" {{old('dis_reubicarse') ? 'checked' : (isset($vacante->dis_reubicarse) ? ($vacante->dis_reubicarse ? 'checked' : '') : '')}}> Disponibilidad para reubicarse
                    </label>
                </div>

                </form>
                  @if(isset($vacante))
                    <button type="submit" form="formulario" class="btn btn-success" form="formulario">Actualizar</button>
                  @else
                    <button type="submit" class="btn btn-success" form="formulario">Registrar Vacante</button>
                  @endif                  
                  <a href="{{ route('vacante.index') }}" class="btn btn-danger">Regresar</a>
                  @if(isset($vacante))
                    <form action="{{ route('vacante.destroy', $vacante->id)}}" method="post" class="mt-3">
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