@extends('layouts.app')
@section('content')
<form method="post">
  @csrf
  <h1 align="center">CREAR CLIENTE</h1>
  <div class="jumbotron">
    <div class="form-group">
    <label class="col-form-label" for="inputDefault">NOMBRES</label>
    <input name="nombres" type="text" class="form-control" placeholder="INGRESE SUS NOMBRES" id="inputNombre">
  </div>
    <div class="form-group">
    <label class="col-form-label" for="inputDefault">APELLIDOS</label>
    <input name="apellidos" type="text" class="form-control" placeholder="INGRESE SUS APELLIDOS" id="inputApellido">
  </div>
    <div class="form-group">
    <label class="col-form-label" for="inputDefault">NIT</label>
    <input name="nit" type="text" class="form-control" placeholder="INGRESE SU NUMERO DE IDENTIFICACION TRIBUTARIA" id="inputNit">
  </div>
    <div class="form-group">
    <label class="col-form-label" for="inputDefault">DIRECCION DE ENVIO</label>
    <input name="direnvio" type="text" class="form-control" placeholder="INGRESE SU DIRECCION" id="inputDireccion">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">CORREO ELECTRONICO</label>
    <input name="correo" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="INGRESE SU CORREO ELETRONICO">
    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">CONTRASEÑA</label>
    <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="INGRESE SUS PASSWORD">
  </div>
  <hr class="my-4">

  <fieldset class="form-group">
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" value="" checked="">
        He leído y aceptado los terminos y condiciones para el uso de la aplicacion.
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" value="" checked="">
        Deseo recibir informacion y promociones a mi correo electrónico.
      </label>
    </div>
  </fieldset>

  <button type="submit" class="btn btn-primary btn-lg btn-block">CREAR CLIENTE</button>
  </div>

</form>
@endsection
