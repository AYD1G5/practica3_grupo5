@extends('layouts.app')
@section('content')
<hr class="my-3">
<div class="jumbotron">
    <div >
        <div >
            <h1 >Pago en Efectivo</h1>
        </div>
    </div>

  <hr class="my-3">
  
		<h3><strong>Total: {{number_format((float)$total, 2, '.', '')}} </strong></h3>
        <h3><p>Pago:<input type=text name="pagar"></h3>
        <button type="submit" class="btn btn-primary">Pagar</button>
    </div>
    @endsection
