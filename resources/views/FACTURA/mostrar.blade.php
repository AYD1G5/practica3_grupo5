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
        <div class="col-md-7">
            <h1 class="display-3" style="margin-left:5%;">Detalle Factura No. {{ $factura->id_factura }} </h1>
        </div>
        <div class="col-md-2">
            <img src="{{URL::asset('/img/recibo.png')}}" alt="profile Pic" height="100" width="100">    
        </div>
        <div class="col-md-3">
            <h3>Total: <strong>Q. {{number_format((float)$total, 2, '.', '')}}</strong></h3>
            <h5>Total con IVA: <strong>Q. {{number_format((float)$totaliva, 2, '.', '')}}</strong></h5>
        </div>
    </div>
    <hr class="my-2">
  <h4 class="text-center"><strong>Fecha de la compra: &nbsp</strong> {{$factura->fecha}}</h4>
  
      <div class="btn-group-inline text-center" role="group" aria-label="">
            <strong>Estado del pedido:</strong> &nbsp
            @if($factura->estado === 0)
                <a href="#" class="btn btn-primary"> En preparación </a>     
            @elseif($factura->estado === 1)
                <a href="#" class="btn btn-danger"> En tránsito </a>     
            @elseif($factura->estado === 2)
                <a href="#" class="btn btn-success"> Entregado </a>     
            @elseif($factura->estado === 3)
                <a href="#" class="btn btn-danger"> Cancelado </a>     
            @endif
    </div>
  <hr class="my-3">
	<div class="table-responsive text-center rounded">
            <table class="table table-hover table-striped text-center" style="width:80%; margin-left:10%;">
            <thead>
                <tr class="table-info">
                    <th style="width: 15%; color:#FFF6DE;"> Imagen </th>   
                    <th style="width: 10%; color:#FFF6DE;"> ID </th>
                    <th style="width: 15%; color:#FFF6DE;"> Nombre Producto </th>
                    <th style="width: 10%; color:#FFF6DE;"> Cantidad </th>
                    <th style="width: 10%; color:#FFF6DE;"> Precio/U </th>
                    <th style="width: 10%; color:#FFF6DE;"> IVA Total </th>
                    <th style="width: 15%; color:#FFF6DE;"> Subtotal sin IVA</th>
					<th style="width: 15%; color:#FFF6DE;"> Subtotal con IVA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detallesfactura as $det)
                <tr bgcolor="#E5E5E5">
                    <td><img src="{{URL::asset('/fotosproductos/'.$det->ruta_imagen)}}" alt="profile Pic" height="40" width="40"> 
                    </td>
                    <td class="align-middle"> {{ $det->id_producto }} </td>
					<td class="align-middle"> {{ $det->nombre_producto }} </td>
                    <td class="align-middle"> {{ $det->cantidad }} </td>
                    <td class="align-middle"> {{number_format((float)$det->precio, 2, '.', '')}} </td>
                    <td class="align-middle"> {{number_format((float)$det->iva, 2, '.', '')}} </td>
                    <td class="align-middle"> {{number_format((float)$det->subtotal, 2, '.', '')}} </td>
                    <td class="align-middle"> {{number_format((float)$det->subtotaliva, 2, '.', '')}} </td>
                </tr>
                @endforeach
				<tr bgcolor="#E5E5E6">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
                    <td></td>
					<td><strong>Total: {{number_format((float)$total, 2, '.', '')}} </strong></td>
                    <td><strong>Total IVA: {{number_format((float)$totaliva, 2, '.', '')}}</strong></td>
				</tr>
            </tbody>
        </table>

    </div>
    @endsection
