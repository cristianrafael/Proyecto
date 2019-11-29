@extends('layouts.app')

@section('content')
<section class="blog single-blog section">
	<div class="container">
		<div class="row">


			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
							          @if (session('success'))
                <div class="alert alert-success">
                  <ul>
                    <li>{{ session('success') }}</li>
                  </ul>
                </div><br />
              @endif
				<article class="single-post">
					<h3>{{$vacante->titulo}}</h3>
					<ul class="list-inline">
						<!--<li class="list-inline-item">by <a href="">Admin</a></li>-->
						<li class="list-inline-item">Publicado el {{$vacante->created_at}}</li>
					</ul>
					<ul class="category-list">
						<p class="mb-2"><b>Descripcion del puesto:</b> {{$vacante->descripcion_puesto}}</p>
						<p class="mb-2"><b>Sueldo ofrecido:</b> {{$vacante->sueldo}}</p>
						<p class="mb-2"><b>Ubicación:</b> {{$vacante->ubicacion}}</p>
						<p class="mb-2"><b>Numero de vacantes:</b> {{$vacante->no_vacantes}}</p>
						<p class="mb-2"><b>Horario del puesto:</b> {{$vacante->horario}}</p>
						<p class="mb-2"><b>Experiencia requerida: </b>{{$vacante->experiencia}}</p>
						<p class="mb-2"><b>Disponibilidad para viajar: </b>{{$vacante->dis_viajar ? 'Si' : 'No'}}</b></p>
						<p class="mb-2"><b>Disponibilidad para reubicarse: </b>{{$vacante->dis_reubicarse ? 'Si' : 'No'}}</b></p>
					</ul>

					@if(Auth::guest())
						<p>¿Quieres postularte para esta vacante? <a href="{{ route('login') }}" >Iniciar Sesion</a><p>
					@else
						<a style="color: white" class="btn btn-success" href="{{ route('dashboard.postulations.store',$vacante->id)}}">Postularme</a>
					@endif

					<ul class="social-circle-icons list-inline">
				  		<li class="list-inline-item text-center"><a class="fa fa-facebook" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-twitter" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-google-plus" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-pinterest-p" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-linkedin" href=""></a></li>
				  	</ul>
				</article>

			</div>
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- Category Widget -->
					<div class="widget category">
						<!-- Widget Header -->
						<h4 class="widget-header">Categorias</h4>
						<ul class="category-list">
							@foreach($categorias as $categoria)
								<li style="cursor: pointer;"><a onclick="$('#category').val({{$categoria->id}}).change(); document.getElementById('busqueda').submit();">{{$categoria->nombre}}</a></li>
							@endforeach
						</ul>

						<form action="{{ route('busqueda')}}" method="POST" id="busqueda">
						 	@csrf
						 	<input type="hidden" id="category" name="category">
						</form>

					</div>
					
					<!-- Archive Widget -->
					<!--<div class="widget archive">
						
						<h5 class="widget-header">Archives</h5>
						<ul class="archive-list">
							<li><a href="">January 2017</a></li>
							<li><a href="">February 2017</a></li>
							<li><a href="">March 2017</a></li>
							<li><a href="">April 2017</a></li>
							<li><a href="">May 2017</a></li>
						</ul>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</section>
@endsection