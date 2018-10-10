@extends('layouts.app')
@section('content')

<div class="jumbotron">
  <h1 class="display-3">Compra de Productos al Proveedor</h1>
  <p class="lead">Ingrese la información necesaria para crear el registro</p>
  <div>
		<a href="{{url('/ProveedorProducto/finalizar')}}" class="btn btn-info">
							Realizar compra
             <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> 
        </a>
    </div>
  <hr class="my-4">
  	

  <form method="POST" action="/ProveedorProducto" accept-charset="UTF-8" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <div class="row">
		<label class="col-form-label" for="inputProducto">Seleccionar Producto</label>
		<div class="col-6 col-md-3">	
			<select id="id_prod" class="form-control{{ $errors->has('id_prod') ? ' is-invalid' : '' }}" name="id_prod" value="{{ old('id_prod') }}" required>
			@foreach ($productos as $prod)
				<option value="{{$prod->id_producto}}">{{$prod->nombre}}</option>
			@endforeach
			</select>
		</div>
		<div class="col-6 col-md-3">
			<input name="cantidad" type="number" class="form-control" placeholder="Cantidad">
		</div>
		<div class="col-6 col-md-3">
			<input name="precio" type="text" class="form-control" placeholder="Precio">
		</div>
		<div class="col-6 col-md-1">
			<div class="button"> </div> 
			<button type="submit">Agregar</button>
		</div> 
    </div>
</div>


	<div class="table-responsive">
            <table class="table table-hover table-striped text-center">
            <thead>
                <tr bgcolor="#FFC300">
                    <th style="width: 10%"> ID Producto </th>
                    <th style="width: 25%"> Nombre Producto </th>
                    <th style="width: 15%"> Cantidad </th>
                    <th style="width: 15%"> Precio </th>
					<th style="width: 15%"> Subtotal </th>
					<th style="width: 15%"> Eliminar </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalles as $det)
                <tr bgcolor="#E5E5E5">
                    <td> {{ $det->id_producto }} </td>
					<td> {{ $det->nombre_producto }} </td>
					<td> {{ $det->cantidad }} </td>
					<td> {{ $det->precio }} </td>
					<td> {{ $det->subtotal }} </td>
					<td>{!! link_to('/ProveedorProducto/eliminar/'.$det->id_detalle_compra, 'Eliminar', ['class' => 'btn btn-danger btn-raised btn-md']) !!}</td>
                </tr>
                @endforeach
				<tr bgcolor="#E5E5E6">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><strong>Total: {{$total}}</strong></td>
				</tr>
            </tbody>
        </table>

    </div>


</form>   
@endsection
