@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							<img src="{{$user->candidato->image}}" alt="" class="rounded-circle">
						</div>
						<!-- User Name -->
						<h5 class="text-center">{{$user->name}}</h5>
						<p>Unido el {{$user->created_at->toDateString()}}</p>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li>
								<a href="{{route('dashboard.profile')}}"><i class="fa fa-user"></i> Perfil</a></li>
							<li>
								<a href="{{route('dashboard.files')}}"><i class="fa fa-bookmark-o"></i> Mis referencias</a>
							</li>
							<li>
								<a href="{{route('dashboard.postulations')}}"><i class="fa fa-file-archive-o"></i> Postulaciones</a>
							</li>
							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-cog"></i> Cerrar Sesión</a>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">

				@yield('subcontent')

			</div>
		</div>
	</div>
@endsection