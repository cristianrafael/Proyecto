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
              <li class="breadcrumb-item active">Candidatos</li>
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
              <h3 class="card-title">{{count($candidatos)}} {{ __('Candidatos') }} registrados</h3>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group row mb-3">
                    <a href="{{ route('candidato.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
              </div>
              <table class="table table-bordered table-striped" id="tabla">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Correo</th>
                          <th scope="col">Edad</th>
                          <th scope="col">Genero</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($candidatos as $candidato)
                        <tr>
                          <td>{{$candidato['id']}}</td>
                          <td><img src="{{$candidato['image']}}" width="50px"></td>
                          <td>{{$candidato['nombre']}}</td>
                          <td>{{$candidato['user']['email']}}</td>
                          <td>{{$candidato['edad']}}</td>
                          <td>{{$candidato['genero']}}</td>
                          <td><a href="{{ route('candidato.show', $candidato->id) }}" class="btn btn-primary col-12"><i class="fas fa-user-tie"></i> Detalles</a></td>
                          <td><a href="{{ route('candidato.archivos.index', $candidato->id) }}" class="btn btn-warning col-12"><i class="fas fa-file"></i> Archivos</a></td>
                          <td><a href="{{ route('candidato.edit',$candidato->id) }}" class="btn btn-success col-12"><i class="fas fa-edit"></i> Editar</a></td>
                          <td>
                             <form action="{{ route('candidato.destroy', $candidato->id)}}" method="post">
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