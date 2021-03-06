<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calssimax</title>
  
  <!-- PLUGINS CSS STYLE -->
  <link href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  
  <!-- Fancy Box -->
  <link href="{{asset('plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <!--<link href="{{asset('plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css')}}" rel="stylesheet">-->
  <!-- CUSTOM CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">

  @yield('styles')


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- JAVASCRIPTS -->
  <script src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('plugins/tether/js/tether.min.js')}}"></script>
  <script src="{{asset('plugins/raty/jquery.raty-fa.js')}}"></script>
  <script src="{{asset('plugins/bootstrap/dist/js/popper.min.js')}}"></script>
  <script src="{{asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
  <script src="{{asset('plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
  
  @yield('scripts')
</head>

<body class="body-wrapper">


<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg  navigation">
					<a class="navbar-brand" href="{{ route('index') }}">
						<img src="../images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">

						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="{{ route('index') }}">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('front.vacante.index') }}">Vacantes</a>
							</li>
							<!--<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="category.html">Category</a>
									<a class="dropdown-item" href="single.html">Single Page</a>
									<a class="dropdown-item" href="store-single.html">Store Single</a>
									<a class="dropdown-item" href="dashboard.html">Dashboard</a>
									<a class="dropdown-item" href="user-profile.html">User Profile</a>
									<a class="dropdown-item" href="submit-coupon.html">Submit Coupon</a>
									<a class="dropdown-item" href="blog.html">Blog</a>
									<a class="dropdown-item" href="single-blog.html">Single Post</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</li>-->
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
              @guest
  							<li class="nav-item">
                  <a class="nav-link login-button" href="{{ route('login') }}" >Iniciar Sesion</a>
  							</li>
  							<li class="nav-item">
  								<a class="nav-link add-button" href="{{ route('register')}}"><i class="fa fa-plus-circle"></i> Registrarse</a>
  							</li>

              @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      Bienvenido {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      @if(!Auth::user()->admin)
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            {{ __('Mi perfil') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('dashboard.files') }}">
                            {{ __('Referencias') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('dashboard.postulations') }}">
                            {{ __('Postulaciones') }}
                        </a>
                      @else
                        <a class="dropdown-item" href="{{ route('admin') }}">
                            {{ __('Panel administrativo') }}
                        </a>
                      @endif
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Cerrar sesión') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                      

                  </div>
                </li>
              @endguest
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>

<!--===============================
=            Area principal       =
================================-->
@yield('content')


<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="../images/logo-footer.png" alt="">
          <!-- description -->
          <p class="alt-color">Este sitio fue desarrollado en laravel para la materia de Programación para internet por Cristian Rafael Romero Chávez</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-4 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Paginas del front</h4>
          <ul>
            <li><a href="{{ route('dashboard') }}">Mi perfil (Con sesión)</a></li>
            <li><a href="{{ route('dashboard.files')}}">Referencias/Archivos (Con sesión)</a></li>
            <li><a href="{{ route('dashboard.postulations') }}">Postulaciones (Con sesión)</a></li>
            <li><a href="{{ route('front.vacante.index') }}">Vacantes (Con/Sin sesión)</a></li>
            <li><a href="{{ route('register')}}">Registrarse (Sin sesión)</a></li>
            <li><a href="{{ route('login') }}">Iniciar sesión (Sin sesión)</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-4 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>Admin Pages</h4>
          <ul>
            <li><a href="{{ route('candidato.index') }}">Candidatos</a></li>
            <li><a href="{{ route('vacante.index') }}">Vacantes</a></li>
            <li><a href="{{ route('categoria.index') }}">Categorias</a></li>
          </ul>
        </div>
      </div>
      <!-- Promotion -->
      <!--<div class="col-lg-4 col-md-7">
        <div class="block-2 app-promotion">
          <a href="">
            <img src="../images/footer/phone-icon.png" alt="mobile-icon">
          </a>
          <p>Get the Dealsy Mobile App and Save more</p>
        </div>
      </div>-->
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-12">
          <!-- Copyright -->
          <div class="copyright">
            <p>Copyright © 2019</p>
          </div>
        </div>
        <div class="col-sm-6 col-12">
          <!-- Social Icons -->
          <ul class="social-media-icons text-right">
              <li><a class="fa fa-facebook" href=""></a></li>
              <li><a class="fa fa-twitter" href=""></a></li>
              <li><a class="fa fa-pinterest-p" href=""></a></li>
              <li><a class="fa fa-vimeo" href=""></a></li>
            </ul>
        </div>
      </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
      <a id="top" class="" href=""><i class="fa fa-angle-up"></i></a>
    </div>
</footer>
</body>

</html>



