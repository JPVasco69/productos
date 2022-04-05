<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Plataforma de Productos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
		<noscript><link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="{{asset('images/logo.svg')}}" alt="" /></span><span class="title">JPVF</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="{{ route('productos.index') }}">Inicio</a></li>
                            @auth
                            <li><a href="{{ route('admin.home') }}">Panel de Administración</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                                @endif
                            @endauth
						</ul>
					</nav>