@extends('layouts.app')
@section('content')
<hr class="my-3">
<div class="jumbotron">
    @if(Session::has('notice'))
        <div class="alert alert-success">
           {{ Session::get('notice') }}
        </div>
     @endif
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-3">Carrito de Compras</h1>
        </div>
        <div class="col-md-3">
            <img src="{{URL::asset('/img/cart2.png')}}" alt="profile Pic" height="100" width="100">    
        </div>
        <div class="col-md-3">
            <h4 class="font-weight-light">Total: </h4> 
            <h3 class="font-weight-light">Q. {{$total}}</h3>
        </div>
    </div>

  <p class="lead">Productos en el carrito actualmente</p>

      <div class="btn-group-inline" role="group" aria-label="">
            <a href="{{url('/Carrito/Vaciar')}}" class="btn btn-danger"> Vaciar Carrito </a>
           <a href="{{url('/Carrito/FinalizarCompra')}}" class="btn btn-primary"> Proceder al Pago </a>
    </div>
  <hr class="my-3">
	<div class="table-responsive">
            <table class="table table-hover table-striped text-center">
            <thead>
                <tr bgcolor="#FFC300">
                    <th style="width: 15%"> Imagen </th>   
                    <th style="width: 10%"> ID </th>
                    <th style="width: 15%"> Nombre Producto </th>
                    <th style="width: 15%"> Cantidad </th>
                    <th style="width: 15%"> Precio </th>
					<th style="width: 15%"> Subtotal </th>
					<th style="width: 15%"> Eliminar </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productoscarrito as $pcar)
                <tr bgcolor="#E5E5E5">
                    <td><img src="{{URL::asset('/fotosproductos/'.$pcar->ruta_imagen)}}" alt="profile Pic" height="100" width="100"> 
                    </td>
                    <td class="align-middle"> {{ $pcar->id_producto }} </td>
					<td class="align-middle"> {{ $pcar->nombre_producto }} </td>
                    <td class="align-middle">
                    <?php
                        echo Form::open(array('route' => array('ActualizarCantidad', $pcar->id_carrito_producto), 'class'=>'form-inline'));
                        echo Form::number('cantidad', $pcar->cantidad, ['min'=>0, 'class' => 'form-control form-control-sm', 'style' => 'width:40%;']);
                        echo Form::submit('Actualizar', ['class' => 'btn btn-info btn-sm']);
                        echo Form::close();
                    ?>
                    </td>
                    <td class="align-middle"> {{number_format((float)$pcar->precio, 2, '.', '')}} </td>
                    <td class="align-middle"> {{number_format((float)$pcar->subtotal, 2, '.', '')}} </td>
					<td class="align-middle"> {!! link_to('/Carrito/EliminarProducto/'.$pcar->id_carrito_producto, 'Eliminar', ['class' => 'btn btn-danger btn-raised btn-md']) !!}</td>
                </tr>
                @endforeach
				<tr bgcolor="#E5E5E6">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><strong>Total: {{number_format((float)$total, 2, '.', '')}} </strong></td>
                    <td></td>
				</tr>
            </tbody>
        </table>

    </div>
    @endsection
