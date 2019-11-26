@extends('admin.layout')

@section('content')
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vacantes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Vacantes</li>
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
              <h3 class="card-title">{{count($vacantes)}} {{ __('Vacantes') }} registradas</h3>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group row mb-3">
                    <a href="{{ route('vacante.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
              </div>
              <table class="table table-bordered table-striped" id="tabla">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Titulo</th>
                          <th scope="col">Sueldo</th>
                          <th scope="col">Ubicacion</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Vacantes</th>
                          <th scope="col">Horario</th>
                          <th scope="col">Experiencia</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($vacantes as $vacante)
                        <tr>
                          <td>{{$vacante['id']}}</td>
                          <td>{{$vacante['titulo']}}</td>
                          <td>{{$vacante['sueldo']}}</td>
                          <td>{{$vacante['ubicacion']}}</td>
                          <td>{{$vacante['descripcion_puesto']}}</td>
                          <td>{{$vacante['no_vacantes']}}</td>
                          <td>{{$vacante['horario']}}</td>
                          <td>{{$vacante['experiencia']}}</td>

                          <td><a href="{{ route('vacante.show', $vacante->id) }}" class="btn btn-primary col-12"><i class="fas fa-user-tie"></i> Detalles</a></td>
                          <td><a href="{{ route('vacante.edit',$vacante->id) }}" class="btn btn-success col-12"><i class="fas fa-edit"></i> Editar</a></td>
                          <td>
                             <form action="{{ route('vacante.destroy', $vacante->id)}}" method="post">
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