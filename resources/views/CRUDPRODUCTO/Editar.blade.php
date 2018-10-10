@extends('layouts.app')
@section('content')
<form method="post">
  @csrf
  <table class="table table-hover">
  <thead>
  <tr class="table-primary">
    <th scope="col">Id.</th>
    <th scope="col">Nombre</th>
    <th scope="col">Descripcion</th>
    <th scope="col">Cantidad</th>
    <th scope="col">Ruta Imagen</th>
    <th scope="col">Precio</th>
  </tr>
  </thead>
    <tbody>
      @foreach($productos as $producto)
        <tr class="table-info">
          <th scope="row">{{ $producto->id_producto }}</th>
          <td>{{ $producto->nombre }}</td>
          <td>{{ $producto->descripcion }}</td>
          <td>{{ $producto->cantidad_disponible }}</td>
          <td>{{ $producto->ruta_imagen }}</td>
          <td>{{ $producto->precio }}</td>
          <td>{!! link_to('Editar2/'.$producto->id_producto, 'Editar', ['class' => 'btn btn-warning']) !!}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</form>
@endsection

