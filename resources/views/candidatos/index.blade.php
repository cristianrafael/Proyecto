@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Candidatos') }}</div>

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
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($candidatos as $candidato)
                                <tr>
                                  <td>{{$candidato['id']}}</td>
                                  <td>{{$candidato['nombre']}}</td>
                                  <td>{{$candidato['titulo']}}</td> 
                                  <td>{{$candidato['edad']}}</td>
                                  <td>{{$candidato['genero']}}</td>
                                  <td><a href="{{ route('candidato.show', $candidato->id) }}" class="btn btn-primary">Ver</a></td>
                                  <td><a href="{{ route('candidato.edit',$candidato->id) }}" class="btn btn-success">Editar</a></td>
                                  <td>
                                     <form action="{{ route('candidato.destroy', $candidato->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                      </form>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('candidato.create') }}" class="btn btn-primary">Agregar nuevo candidato</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
