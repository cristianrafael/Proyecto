@extends('admin.layout')

@section('content')
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Archivos de {{$candidato->nombre}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('candidato.index')}}">Candidatos</a></li>
              <li class="breadcrumb-item">{{$candidato->nombre}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Archivos</h3>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
                
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
              

                <div class="form-group row mb-3">
                    <div class="col">
                        <a href="{{ route('candidato.archivos.create',['candidato' => $candidato->id]) }}" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
                        <a href="{{ route('candidato.index')}}" class="btn btn-danger"><i class="fas fa-arrow"></i> Regresar</a>
                    </div>
                </div>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Archivo</th>
                        <th>Tamaño (bytes)</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    @foreach($candidato->archivos as $archivo)
                        <tr>
                            <td>{{ $archivo->original }}</td>
                            <td>{{ $archivo->tamaño }}</td>
                            <td>
                                <a href="{{ route('download', $archivo->id) }}" class="btn btn-sm btn-success">Descargar</a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['candidato.archivos.destroy', $candidato->id, $archivo->id], 'method' => 'DELETE']) !!}
                                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>

            

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
@endsection
