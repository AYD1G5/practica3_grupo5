@extends('layouts.app')
@section('content')
<div >
  <h1>Estado de Envios</h1>
</div>
<div >
        <table class="table">
        <thead>
            <tr>
             <th style="width: 10%"> Id Factura </th>
             <th style="width: 10%"> Usuario </th>
             <th style="width: 10%"> Fecha</th>
             <th style="width: 10%"> Estado</th>
             <th style="width: 10%"> Total</th>
             <th style="width: 40%"> Cambiar Estado</th>
          </tr>
       </thead>
                <tbody>
                @foreach ($facturas as $elemento)
                    <tr>
                    <td>{{$elemento->id_factura}} </td>
                    <td>{{$elemento->id_user}} </td>
                    <td>{{$elemento->fecha}} </td>
                    @if($elemento->estado==0)
                    <td>En Preparacion </td>
                    @elseif($elemento->estado==1)
                    <td>En tránsito </td>
                    @elseif($elemento->estado==2)
                    <td> Entregado</td>
                    @elseif($elemento->estado==3)
                    <td>Cancelado</td>
                    @endif
                    <td>{{$elemento->total}} </td>
                    <td><a class="btn btn-primary" href="{{ url('/CambiarEstado/0/'. $elemento->id_factura) }}">En preparacion</a>
                    <a class="btn btn-primary" href="{{ url('/CambiarEstado/1/'. $elemento->id_factura) }}">En Transito</a>
                    <a class="btn btn-primary" href="{{ url('/CambiarEstado/2/'. $elemento->id_factura) }}">Entregado</a>
                    <a class="btn btn-primary" href="{{ url('/CambiarEstado/3/'. $elemento->id_factura) }}">Cancelado</a></td>
                    </tr>
                @endforeach 
                </tbody>
            </table>
</div>
@endsection