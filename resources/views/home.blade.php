@extends('layouts.app')

@section('content')
<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Postulate ahora mismo! </h1>
					<p>Crea tu pefil profesional y busca tu equipo de trabajo.<br> Todos los dias hay vacantes nuevas</p>
					<!--<div class="short-popular-category-list text-center">
						<h2>Categorias Populares</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href=""><i class="fa fa-bed"></i> Hotel</a></li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-grav"></i> Fitness</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-car"></i> Cars</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-cutlery"></i> Restaurants</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-coffee"></i> Cafe</a>
							</li>
						</ul>
					</div>-->
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
					 <form action="{{ route('busqueda')}}" method="POST" id="busqueda">
					 	@csrf
						<div class="row">
							<!-- Store Search -->
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="palabras" id="search" placeholder="Palabras clave">
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<select id="category" class="form-control mb-2 mr-sm-2 mb-sm-0" name="category" autocomplete="category">
			                            <option value="" selected>Seleccione una categoria</option>
			                            @foreach($categorias as $categoria)
			                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
			                            @endforeach
			                        </select>
									
									<button type="submit" class="btn btn-main">Buscar</button>
								</div>
							</div>
						</div>
					</form>
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>





<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>Categorias</h2>
					<p>Busca hoy la oportunidad de formar parte de nuestra empresa</p>
				</div>
				<div class="row">
					@php $colores = ["fa fa-laptop icon-bg-1","fa fa-apple icon-bg-2","fa fa-home icon-bg-3","fa fa-shopping-basket icon-bg-4","fa fa-briefcase icon-bg-5","fa fa-car icon-bg-6","fa fa-paw icon-bg-7","fa fa-laptop icon-bg-8"]; @endphp
					@foreach($categorias as $categoria)
						<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
							<div class="category-block" style="cursor: pointer;" onclick="$('#category').val({{$categoria->id}}).change(); document.getElementById('busqueda').submit();">
								<div class="header">
									<i class="{{$colores[rand(0,7)]}}"></i>
									<h4>{{$categoria->nombre}}</h4>

									{{$categoria->nombre}}</a></li>
								</div>
							</div>
						</div>
					@endforeach

						
					
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
@endsection