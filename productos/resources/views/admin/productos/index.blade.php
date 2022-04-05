@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listar Productos</h1>
@stop

@section('content')

    @livewire('productos-index')

@stop