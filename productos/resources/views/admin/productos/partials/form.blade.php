<div class="row"> 
    <div class="col">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto']) !!}

            @error('nombre')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('valor', 'Valor') !!}
            {!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor del producto']) !!}

            @error('valor')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('estado', 'Estado') !!}
            {!! Form::select('estado', $estado, null, ['class' => 'form-control']) !!}

            @error('estado')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="image-wrapper">
            @isset($producto->image)
                <?php $ruta = str_replace("public/", "", $producto->image->url); ?>
                <img id="picture" src="{{asset("storage/".$ruta)}}" alt="Foto Producto">
            @else
                <img id="picture" src="http://es.pecc-mexico.org/wp-content/uploads/2020/11/d437da2a54918895cf59a3362a0099ec-album-de-fotos-plano-icono-by-vexels.png" alt="Foto Producto">
            @endisset
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Foto del producto') !!}

            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

            @error('file')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('municipio_id', 'Municipios') !!}
            <br/>
            {!! Form::select('municipio_id[]', $municipios, $checks, ['class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) !!}

            @error('municipio_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción') !!}
            {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}

            @error('descripcion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#descripcion'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                theme: "classic",
                allowClear: true,
            });

            $('#file').change(function(e){
                let file= e.target.files[0];
                let reader= new FileReader();

                reader.onload = (event) => {
                    $('#picture').attr('src', event.target.result)
                };
                reader.readAsDataURL(file);
            });
        });

    </script>
@stop