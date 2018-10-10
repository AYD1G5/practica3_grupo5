@extends('layouts.app')
@section('content')
<div >
  <h1>Catalogo de productos</h1>
</div>
<div >
            <table class="table table-hover" border="0px" >
                <tbody>
                    @foreach ($catalogo as $elemento)
                    @if($contador==0)	
                    <tr>
                    @endif
                        <td>
                        <center>
                        <a href="{{url('/PerfilProducto/'.$elemento->id_producto.'')}}"><img src="\fotosproductos\{{$elemento->ruta_imagen}}" width=125 height=150><br></a>
                        <a href="{{url('/PerfilProducto/'.$elemento->id_producto.'')}}"style="height:50px;width: 40%; font-size: 20px; color:gray">{{$elemento->nombre}}</a>
                        <br><p style="color:#5a88ca;font-family: Times New Roman”, Times, serif;font-size: 20px;">Q{{$elemento->precio}}
                        </center><div id='oculto' style='display:none;'>{{$contador++}}</div>
                        </td>
                    @if($contador==3)
                        </tr>
                        <div id='oculto' style='display:none;'>{{$contador=0}}</div>
                    @endif
                    @endforeach 
                </tbody>
            </table>
</div>
@endsection