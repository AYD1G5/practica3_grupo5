@extends('layouts.app')
@section('content')
<h1>Clientes</h1>
<a class="btn btn-primary" href="{{ url('/CrearCliente')}}">Crear Cliente</a>
<a class="btn btn-primary" href="{{ url('/EditarCliente')}}">Editar Cliente</a>
<a class="btn btn-primary" href="{{ url('/EliminarCliente')}}">Eliminar Cliente</a>
<h1>Productos</h1>
<a class="btn btn-primary" href="{{ url('/CrearProducto')}}">Crear Producto</a>
<a class="btn btn-primary" href="{{ url('/Editar')}}">Editar Producto</a>
<a class="btn btn-primary" href="{{ url('/Eliminar')}}">Eliminar Producto</a>
<h1>Ordenes</h1>
<a class="btn btn-primary" href="{{ url('/EnviosAdmin')}}">Estado Ordenes</a>
@endsection