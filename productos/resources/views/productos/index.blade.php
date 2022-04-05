@include('menu')

	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<h1>Bienvenidos<br />
				Al catálogo de productos.</h1>
				<p>En el menú se encontrarán el resto de opciones de la prueba.</p>
			</header>
			<section class="tiles">
				@foreach ($productos as $producto)
					@php
						$ruta = str_replace("public/", "", $producto->image->url);
						$numero = rand(1,6);
					@endphp
					<article class="style{{$numero}}">
						<span class="image">
							<img src="{{asset("storage/".$ruta)}}" alt="{{$producto->nombre}}" />
						</span>
						<a href="{{ route('productos.show',$producto) }}">
							<h2>{{$producto->nombre}}</h2>
						</a>
					</article>
				@endforeach
			</section>
		</div>
	</div>

@include('footer')