@include('menu')

<!-- Main -->
<div id="main">
    <div class="inner">
        <h1>{{$producto->nombre}}</h1>
        @php
            $ruta = str_replace("public/", "", $producto->image->url);
        @endphp
        
        <div class="row">
            <div class="col-6 col-12-medium">
                <center><img src="{{asset("storage/".$ruta)}}" alt="{{$producto->nombre}}" width="40%" height="auto"/></center>
            </div>

            <div class="col-6 col-12-medium">
                <h4>Municipios donde esta disponible el producto</h4>
                <ul class="alt">
                    @foreach ($municipios as $municipio) 
                        <li><strong style="color: #04d49c;">{{$municipio}}</strong></li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div class="row">
            <section>
                @php
                    $descripcion = htmlentities($producto->descripcion);
                    echo html_entity_decode($descripcion);
                @endphp
                <p>
                    <strong style="color: #04d49c;">
                        @php
                           echo "Costo: $".number_format($producto->valor);
                        @endphp
                    </strong>
                </p>
            </section>
        </div>   

        <div class="row">
            <div class="col-4 col-12-medium">
                <ul class="actions fit small">
                    <li><a href="{{ route('productos.index') }}" class="button primary fit small">Regresar al inicio</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>

@include('footer')