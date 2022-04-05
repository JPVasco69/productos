<div>
    @if($productos->count())
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
    @else
        <div class="row">
            <center><strong>No hay registros disponibles.</strong></center>
        </div>
    @endif
    
</div>
