@extends('layouts.app')
@section('content')
<hr class="my-3">
<div class="jumbotron">
    <div >
        <div >
            <h1 >Resumen</h1>
        </div>
    </div>

  <hr class="my-3">
    <P>Su Total es de: {{$total}}
    <P>Su Pago sera de: {{$pago}}
    <P>Su vuelto es de: {{$vuelto}}
    <form method="POST">

    <a class="btn btn-primary" href="{{ url('/FinalizarCompra') }}">Confirmar</a>
    @endsection
