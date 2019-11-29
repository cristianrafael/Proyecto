@extends('admin.layout')

@section('content')
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Candidatos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('candidato.index')}}">Candidatos</a></li>
              <li class="breadcrumb-item"><a href="{{route('candidato.archivos.index',['candidato' => $candidato->id])}}">{{$candidato->nombre}}</a></li>
              <li class="breadcrumb-item">Archivo</li>

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
              
              {!! Form::open(['route' => ['candidato.archivos.store',$candidato->id], 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('archivo', 'Carga de Archivo')!!}
                {!! Form::file('archivo') !!}
            </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                {!! Form::close() !!}
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
