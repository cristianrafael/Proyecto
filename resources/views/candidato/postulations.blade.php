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
                <th>Vacante</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user->candidato->postulaciones as $vacante)
              <tr>
                <td class="product-details">
                  <h3 class="title">{{$vacante->titulo}}</h3>
                  <span class="add-id"><strong>Sueldo:</strong> {{$vacante->sueldo}}</span>
                  <span><strong>Ubicación:</strong> {{$vacante->ubicacion}}</span>
                  <span class="status"><strong>Horario:</strong> {{$vacante->horario}}</span>
                  <span class="location"><strong>Experiencia:</strong>{{$vacante->experiencia}}</span>
                </td>
                <td class="product-category"><span class="categories"></span>{{$vacante->descripcion_puesto}}</td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="view" href="{{route('front.vacante.show',$vacante->id)}}">
                          <i class="fa fa-eye"></i>
                        </a>    
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" onclick="event.preventDefault(); document.getElementById('logout-delete').submit();" style="cursor: pointer;">
                          <i class="fa fa-trash"></i>
                        </a>
                        <form id="logout-delete" action="{{ route('dashboard.postulations.destroy',$vacante->id) }}" method="post" style="display: none;">
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
        
@endsection
