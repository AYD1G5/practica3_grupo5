@extends('layouts.app')
@section('content')
<form method="post">
  @csrf
  <table class="table table-hover">
  <thead>
  <tr class="table-primary">
    <th scope="col">No.</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellido</th>
    <th scope="col">NIT</th>
    <th scope="col">Direccion Envio</th>
    <th scope="col">Correo</th>
    <th scope="col">Editar</th>
  </tr>
  </thead>
    <tbody>
      @foreach($usuarios as $usuario)
        <tr class="table-info">
          <th scope="row">{{ $usuario->id }}</th>
          <td>{{ $usuario->name }}</td>
          <td>{{ $usuario->apellido }}</td>
          <td>{{ $usuario->nit }}</td>
          <td>{{ $usuario->direccion_envio }}</td>
          <td>{{ $usuario->email }}</td>
          <td>{!! link_to('EditarCliente2/'.$usuario->id, 'Editar', ['class' => 'btn btn-warning']) !!}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</form>
@endsection
