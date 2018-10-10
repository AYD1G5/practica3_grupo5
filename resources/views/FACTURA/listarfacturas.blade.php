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
            <h1 class="display-3">Listado de pedidos</h1>
        </div>
        <div class="col-md-6">
            <img src="{{URL::asset('/img/cart2.png')}}" alt="profile Pic" height="100" width="100">    
        </div>
    </div>

  <p class="lead">Pedidos hechos por el usuario</p>
  <hr class="my-3">
	<div class="table-responsive">
            <table class="table table-hover table-striped text-center">
            <thead>
                <tr class="table-success">
                    <th style="width: 15%"> ID Factura </th>
                    <th style="width: 25%"> Fecha </th>
                    <th style="width: 30%"> Estado </th>
                    <th style="width: 20%"> Total </th>
                    <th style="width: 10%"> Acción </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas_usuario as $fac)
                <tr bgcolor="#E5E5E5">
                    <td class="align-middle"> {{ $fac->id_factura }} </td>
					<td class="align-middle"> {{ $fac->fecha }} </td>
                    <td class="align-middle">
                        @if($fac->estado === 0)
                            En preparación
                        @elseif($fac->estado === 1)
                            En tránsito
                        @elseif($fac->estado === 2)
                            Entregado
                        @elseif($fac->estado === 3)
                            Cancelado
                        @endif
                    </td>
                    <td class="align-middle"> {{number_format((float)$fac->total, 2, '.', '')}} </td>
					<td class="align-middle"> {!! link_to('/Facturas/DetalleFactura/'.$fac->id_factura, 'Mostrar', ['class' => 'btn btn-primary btn-raised btn-md']) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection