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
              <li class="breadcrumb-item"><a href="{{route('candidato.index')}}">Candidatos</a></li>
              <li class="breadcrumb-item">{{$candidato->nombre}}</li>
            </ol>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-12 text-center">
            <h1>{{$candidato->nombre}}</h1>
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
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Perfil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Postulaciones</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Vacantes Disponibles</a>
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
                              Perfil profesional
                            </div>
                            <div class="card-body pt-2">
                              <div class="row">
                                <div class="col-12 text-center">
                                  <img src="{{$candidato->image}}" width="128px" alt="" class="img-circle img-fluid">
                                </div>
                                <div class="col-12 text-center">
                                  <h2 class="lead"><b>{{$candidato->nombre}}</b></h2>
                                  <p class="text-muted text-sm"><b><p>Acerca de mi</p></b><p>{{$candidato->descripcion_personal}} </p>
                                    <p class="text-muted text-sm"><b><p>Perfil profesional</p></b></p><p>{{$candidato->descripcion_profesional}} </p>
                                  <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="medium"><span class="fa-li"></span><b>Edad: </b>{{$candidato->edad}}</li>
                                    <li class="medium"><span class="fa-li"></span><b>Correo: </b>{{$candidato->user->email}}</li>
                                    <li class="medium"><span class="fa-li"></span><b>Telefono: </b> {{$candidato->telefono}}</li>
                                  </ul>
                                </div>
                                
                              </div>
                            </div>
                            <div class="card-footer row">
                              <div class="text-right">
                              
                                <a href="{{route('candidato.edit', $candidato->id)}}" class="btn btn-sm btn-primary">
                                  <i class="fas fa-user"></i> Editar
                                </a>
                                <a href="{{route('candidato.archivos.index', $candidato->id)}}" class="btn btn-sm btn-info">
                                  <i class="fas fa-file-word"></i> Referencias
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>




                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                      <div class="card-body">
                            <table class="table table-bordered table-striped" id="tabla">
                                    <thead>
                                      <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Sueldo</th>
                                        <th scope="col">Ubicacion</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($candidato->postulaciones as $vacante)
                                      <tr>
                                        <td>{{$vacante['titulo']}}</td>
                                        <td>{{$vacante['sueldo']}}</td>
                                        <td>{{$vacante['ubicacion']}}</td>
                                        <td>{{$vacante['descripcion_puesto']}}</td>
                                         <td>
                                           <form action="{{ route('postulacion.destroy',[$candidato->id, $vacante->id])}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger col-12" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                                            </form>
                                        </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                             </table>
                          </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                              



                          <div class="card-body">
                            <table class="table table-bordered table-striped" id="tabla2">
                                    <thead>
                                      <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Sueldo</th>
                                        <th scope="col">Ubicacion</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($vacantes as $vacante)
                                      <tr>
                                        <td>{{$vacante['titulo']}}</td>
                                        <td>{{$vacante['sueldo']}}</td>
                                        <td>{{$vacante['ubicacion']}}</td>
                                        <td>{{$vacante['descripcion_puesto']}}</td>

                                        <td><a href="{{ route('vacante.show', $vacante->id) }}" class="btn btn-primary col-12"><i class="fas fa-user-tie"></i> Detalles</a></td>
                                        <td><a href="{{ route('postulacion.store', [$candidato->id, $vacante->id]) }}" class="btn btn-success col-12"><i class="fas fa-edit"></i> Postularme</a></td>

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
                    <a href="{{ route('candidato.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Regresar</a>
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
     $('#tabla2').DataTable( {
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