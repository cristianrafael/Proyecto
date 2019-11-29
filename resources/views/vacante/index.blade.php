@extends('layouts.app')

@section('content')
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->

				<div class="advance-search">
					 <form action="{{ route('busqueda')}}" method="POST" id="busqueda">
					 	@csrf
						<div class="row">
							<!-- Store Search -->
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="palabras" id="search" placeholder="Palabras clave" value="{{($busqueda['palabras'] ?? '')}}">
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<select id="category" class="form-control mb-2 mr-sm-2 mb-sm-0" name="category" autocomplete="category">
			                            <option value="" selected>Seleccione una categoria</option>
			                            @foreach($categorias as $categoria)
			                                <option style="background: #5672f9" 
			                                        value="{{$categoria->id}}"
			                                        <?php
			                                        	if(isset($busqueda['categoria']))
			                                        		if($busqueda['categoria']['id'] == $categoria->id)
			                                        			echo "selected";
			                                        ?>
			                                >
			                                	{{$categoria->nombre}}
			                            	</option>
			                            @endforeach
			                        </select>
									
									<button type="submit" class="btn btn-primary">Buscar</button>
								</div>
							</div>
						</div>
					</form>
					
				</div>

			</div>
		</div>
	</div>
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					@if(isset($busqueda))
						@if($busqueda['palabras'])
							<h2>Palabras: "{{$busqueda['palabras']}}"</h2>
						@endif
						@if($busqueda['categoria'])
							<h2>Categoria: "{{$busqueda['categoria']['nombre']}}"</h2>
						@endif
					@else
						<h2>Todas las vacantes</h2>
					@endif
					<p>{{count($vacantes)}} Resultados encontrados</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
						<h4 class="widget-header">Categorias</h4>
						<ul class="category-list">
							@foreach($categorias as $categoria)
								<li style="cursor: pointer;"><a onclick="$('#category').val({{$categoria->id}}).change(); document.getElementById('busqueda').submit();">{{$categoria->nombre}}</a></li>
							@endforeach
						</ul>
					</div>

					

					
				</div>
			</div>
			<div class="col-md-9">
				<!--<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<strong>Short</strong>
							<select>
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>-->
				<div class="product-grid-list">
					<div class="row mt-30">
						@foreach($vacantes as $vacante)
						<div class="col-sm-12 col-lg-4 col-md-6">
							<div class="product-item bg-light">
								<div class="card">
									<div class="card-body">
									    <h4 class="card-title"><a href="{{route('front.vacante.show',$vacante->id)}}">{{$vacante->titulo}}</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>@foreach($vacante->categorias as $categoria) {{$categoria->nombre}},@endforeach</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>{{$vacante->created_at->diffForHumans()}}</a>
									    	</li>
									    </ul>
									    <p class="card-text">{{$vacante->descripcion_puesto}}</p>
									    <div class="product-ratings">
									    </div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="pagination justify-content-center">
									{!! $vacantes->render() !!}
					<!--<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>-->
				</div>
			</div>
		</div>
	</div>
</section>
@endsection