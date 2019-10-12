@extends('layouts.app')

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

                  @if(isset($candidato))
                  <form action="{{ route('candidato.update', $candidato->id) }}" method="POST" class="mb-3" id="formulario">
                    <input type="hidden" name="_method" value="PATCH">
                  @else
                  <form action="{{ route('candidato.store') }}" method="POST" class="mb-3" id="formulario">
                  @endif
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" required="required" value="{{ $candidato->nombre ?? '' }}{{old('nombre')}}"/>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" class="form-control" name="titulo" required="required" value="{{ $candidato->titulo ?? '' }}{{old('titulo')}}"/>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad :</label>
                        <input type="text" class="form-control" name="edad" required="required" value="{{ $candidato->edad ?? '' }}{{old('edad')}}" />
                    </div>
                    <div class="form-group">
                        <label for="genero">Genero:</label>
                        <select class="form-control" name="genero" required="required" value="{{ $candidato->genero ?? '' }}{{old('genero')}}">
                          <option value="Hombre">Hombre</option>
                          <option value="Mujer">Mujer</option>
                        </select>
                    </div>
                </form>
                  @if(isset($candidato))
                    <button type="submit" form="formulario" class="btn btn-primary" form="formulario">Actualizar</button>
                  @else
                    <button type="submit" class="btn btn-primary" form="formulario">Crear</button>
                  @endif                  
                  <a href="{{ route('candidato.index') }}" class="btn btn-primary">Regresar</a>
                  @if(isset($candidato))
                    <form action="{{ route('candidato.destroy', $candidato->id)}}" method="post" class="mt-3">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Borrar</button>
                    </form>
                  @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection