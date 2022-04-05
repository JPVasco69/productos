@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Editar producto</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif

<div class="card">
    
    <div class="card-header">
        <a href="{{route('admin.productos.index')}}" class="btn btn-secondary">Regresar al listado</a>
    </div>

    <div class="card-body">
        {!! Form::model($producto, ['route' => ['admin.productos.update', $producto], 'method' => 'put', 'files' => true]) !!}

            @include('admin.productos.partials.form')

            {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>

</div>
    

@stop
