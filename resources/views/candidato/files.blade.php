@extends('candidato.layout')

@section('subcontent')
<!-- Edit Personal Info -->
				 @if (session('success'))
				                <div class="alert alert-success">
				                  <ul>
				                    <li>{{ session('success') }}</li>
				                  </ul>
				                </div><br />
				              @endif
				<div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">Mis referencias</h3>
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th>Archivo</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Tamaño (bytes)</th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user->candidato->archivos as $archivo)
              <tr>
                <td class="product-details">
                  <h3 class="title">{{$archivo->original}}</h3>
                  <!--<span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>
                  <span><strong>Posted on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>Location</strong>Dhaka,Bangladesh</span>-->
                </td>
                <td class="product-category"><span class="categories">{{$archivo->mime}}</span></td>
                <td class="product-category"><span class="categories">{{$archivo->tamaño}}</span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="view" href="{{route('dashboard.files.download',$archivo->id)}}">
                          <i class="fa fa-eye"></i>
                        </a>    
                      </li>
                      <!--<li class="list-inline-item">
                        <a class="edit" href="">
                          <i class="fa fa-pencil"></i>
                        </a>    
                      </li>-->
                      <li class="list-inline-item">
                        <a class="delete" onclick="event.preventDefault(); document.getElementById('logout-delete').submit();" style="cursor: pointer;">
                          <i class="fa fa-trash"></i>
                        </a>
                        <form id="logout-delete" action="{{ route('dashboard.files.destroy',$archivo->id) }}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="widget change-password">
          <h3 class="widget-header user">Nueva referencia</h3>
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">Archivos</h3>
            </div>

            <div class="card-body">
              {!! Form::open(['route' => 'dashboard.files.store', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('archivo', 'Carga de Archivo')!!}
                {!! Form::file('archivo') !!}
            </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                {!! Form::close() !!}
            </div>
         
          </div>
        </div>
				
@endsection
