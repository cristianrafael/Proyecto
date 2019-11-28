@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('vacante.index')}}">Vacantes</a></li>
              <li class="breadcrumb-item">{{$vacante->titulo}}</li>
            </ol>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-12 text-center">
            <h1>{{$vacante->titulo}}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


  <div class="content">
    <div class="row justify-content-center">

      <div class="col-8 ">
              @if (session('success'))
              <div class="alert alert-success col-12">
                <ul>
                  <li>{{ session('success') }}</li>
                </ul>
              </div><br />
            @endif
            
            <div class="card card-info card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Descripción</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Postulado</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Candidatos Disponibles</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                    <div class="row d-flex align-items-stretch">
                        <div class="col-12 d-flex align-items-stretch justify-content-center">
                          <div class="card bg-light col-12 col-sm-8 col-md-10">
                            <div class="card-header text-muted border-bottom-0 row" style="color: white !important">
                              Descripción de la vacante
                            </div>
                            <div class="card-body pt-2">
                              <div class="row">
                                <div class="col-12 text-center">
                                  <h2 class="lead"><b>{{$vacante->titulo}}</b></h2>
                                  <p class="text-muted text-sm"><b><p>Descripción del puesto</p></b><p>{{$vacante->descripcion_puesto}} </p>
                                  <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="medium"><span class="fa-li"></span><b>Sueldo: </b>{{$vacante->sueldo}}</li>
                                    <li class="medium"><span class="fa-li"></span><b>Ubicación: </b>{{$vacante->ubicacion}}</li>
                                    <li class="medium"><span class="fa-li"></span><b>Horario: </b> {{$vacante->horario}}</li>
                                    <li class="medium"><span class="fa-li"></span><b>Experiencia: </b> {{$vacante->experiencia}}</li>
                                    <li class="medium"><span class="fa-li"></span><b>Numero de vacantes: </b> {{$vacante->no_vacantes}}</li>
                                    <li class="medium"><span class="fa-li"></span><b>Disponibilidad para viajar: </b> {{$vacante->dis_viajar ? 'Si' : 'No'}}</li>
                                    <li class="medium"><span class="fa-li"></span><b>Disponibilidad para reubicarse: </b> {{$vacante->dis_reubicarse ? 'Si' : 'No'}}</li><br>
                                    <li class="medium"><span class="fa-li"></span><b>Creada el: </b> {{$vacante->created_at}}</li>
                                  </ul>
                                </div>
                                
                              </div>
                            </div>
                            <div class="card-footer row">
                              <div class="text-right">
                              
                                <a href="{{route('vacante.edit', $vacante->id)}}" class="btn btn-sm btn-primary">
                                  <i class="fas fa-user"></i> Editar
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>






                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="row d-flex align-items-stretch">
                      @foreach($vacante->postulaciones as $candidato)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                          <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0" style="color: white !important">
                              Perfil profesional
                            </div>
                            <div class="card-body pt-2">
                              <div class="row">
                                <div class="col-12 text-center pb-2">
                                  <img src="{{$candidato->image}}" width="70px" alt="" class="img-circle img-fluid">
                                </div>
                                <div class="col-12 text-center">
                                  <h2 class="lead"><b>{{$candidato->nombre}}</b></h2>
                                  <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"></span><b>Correo: </b>{{$candidato->user->email}}</li>
                                    <li class="small"><span class="fa-li"></span><b>Telefono: </b> {{$candidato->telefono}}</li>
                                  </ul>
                                </div>
                                
                              </div>
                            </div>
                            <div class="card-footer row">
                              <div class="text-right">
                              
                                <a href="{{route('candidato.show', $candidato->id)}}" class="btn btn-sm btn-primary">
                                  <i class="fas fa-user"></i> Detalles
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                              



                          <div class="card-body">
                            <table class="table table-bordered table-striped" id="tabla" style="font-size: small;">
                              <thead>
                                <tr>
                                  <th scope="col">Foto</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Correo</th>
                                  <th scope="col">Edad</th>
                                  <th scope="col">Genero</th>
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($candidatos as $candidato)
                                <tr>
                                  <td><img src="{{$candidato['image']}}" width="50px"></td>
                                  <td>{{$candidato['nombre']}}</td>
                                  <td>{{$candidato['user']['email']}}</td>
                                  <td>{{$candidato['edad']}}</td>
                                  <td>{{$candidato['genero']}}</td>
                                  <td><a href="{{ route('candidato.show', $candidato->id) }}" class="btn btn-primary btn-sm col-12"><i class="fas fa-user-tie"></i> Detalles</a></td>
                                  <td><a href="{{ route('postulacion.store', [$candidato->id, $vacante->id]) }}" class="btn btn-success btn-sm col-12"><i class="fas fa-list"></i> Postularse</a></td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="form-group row mb-3">
                    <a href="{{ route('vacante.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Regresar</a>
              </div>
          </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{asset('back/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#tabla').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontró ningun registro :(",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Ningun registro en la base de datos",
            "infoFiltered": "(Busqueda de _MAX_ registros)"
        },
        "ordering": false
    } );
  });
</script>
@endsection