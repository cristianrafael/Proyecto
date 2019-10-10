@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalles') }}</div>

                <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Título</th>
                                  <th scope="col">Edad</th>
                                  <th scope="col">Genero</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>{{$candidato['id']}}</td>
                                  <td>{{$candidato['nombre']}}</td>
                                  <td>{{$candidato['titulo']}}</td>
                                  <td>{{$candidato['edad']}}</td>
                                  <td>{{$candidato['genero']}}</td>
                                  <td>
                                     <form action="{{ route('candidato.destroy', $candidato->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Borrar</button>
                                      </form>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('candidato.index') }}" class="btn btn-primary">Regresar</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
