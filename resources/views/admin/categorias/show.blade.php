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
              <li class="breadcrumb-item"><a href="{{route('categoria.index')}}">Categorias</a></li>
              <li class="breadcrumb-item">{{$categoria->nombre}}</li>
            </ol>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-12 text-center">
            <h1>{{$categoria->nombre}}</h1>
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
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Vacantes Relacionadas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Todas las vacantes</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
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
                                       @foreach($categoria->vacantes as $vacante)
                                      <tr>
                                        <td>{{$vacante['titulo']}}</td>
                                        <td>{{$vacante['sueldo']}}</td>
                                        <td>{{$vacante['ubicacion']}}</td>
                                        <td>{{$vacante['descripcion_puesto']}}</td>
                                         <td>
                                           <form action="{{ route('asignacion.destroy',[$categoria->id, $vacante->id])}}" method="post">
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
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                        
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
                                        <td><a href="{{ route('asignacion.store', [$categoria->id, $vacante->id]) }}" class="btn btn-success col-12"><i class="fas fa-edit"></i> Asignar categoria</a></td>

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
                    <a href="{{ route('categoria.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Regresar</a>
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