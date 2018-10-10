@extends('layouts.app')
 @section('content')
 <div class="container">
    
    <h1> Lista de Productos </h1>
    <div class="row">
       
    </div>
    <table class="table">
       <thead>
       <tr>
             <th style="width: 35%"> Id </th>
             <th style="width: 35%"> Nombre </th>
             <th style="width: 10%"> Descripcion</th>
             <th style="width: 10%"> Cantidad Disponible</th>
             <th style="width: 10%"> </th>
             <th style="width: 10%"> </th>
             <th style="width: 10%"> </th>
          </tr>
       </thead>
       <tbody>
       @foreach ($productos as $producto)
             <tr>
                <td> {{ $producto->id_producto }} </td>
                <td> {{ $producto->nombre }} </td>
                <td> {{ $producto->descripcion }} </td>
                <td> {{ $producto->cantidad_disponible }} </td>
                <td>
                {!! link_to('productos/'.$producto->id, 'Ver', ['class' => 'btn btn-primary']) !!}
                </td>
                <td>
                {!! link_to('productos/'.$producto->id.'/edit', 'Editar', ['class' => 'btn btn-primary']) !!}
                </td>
                <td>
                   
                  {!! Form::open(array('url' => 'VerProducto/' . $producto->id_producto, 'method' => 'DELETE')) !!}
                      {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                   
                </td>
             </tr>
             @endforeach
       </tbody>
    </table>
 </div>
 @endsection