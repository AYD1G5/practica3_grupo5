@extends('layouts.app')
@section('content')
<form method="post">
@csrf
<h1 align="center">EDITAR CLIENTE</h1>
<div class="jumbotron">
  <div class="form-group">
  <label class="col-form-label" for="inputDefault">NOMBRES</label>
  <input name="nombres" type="text" class="form-control" value={{$usuario->name}} id="inputDefault1">
</div>
  <div class="form-group">
  <label class="col-form-label" for="inputDefault">APELLIDOS</label>
  <input  name="apellidos" type="text" class="form-control" value={{$usuario->apellido}} id="inputDefault2">
</div>
  <div class="form-group">
  <label class="col-form-label" for="inputDefault">NIT</label>
  <input name="nit" type="text" class="form-control" value={{$usuario->nit}} id="inputDefault3">
</div>
  <div class="form-group">
  <label class="col-form-label" for="inputDefault">DIRECCION DE ENVIO</label>
  <input name="direnvio"  type="text" class="form-control" value={{$usuario->direccion_envio}} id="inputDefault4">
</div>
  <div class="form-group">
  <label for="exampleInputEmail1">CORREO ELECTRONICO</label>
  <input name="correo" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value={{$usuario->email}}>
</div>
  <div class="form-group">
  <label class="col-form-label" for="inputDefault">CONTRASEÑA</label>
  <input name="pass" type="text" class="form-control" value={{$usuario->password}} id="inputDefault5">
</div>
<hr class="my-4">

<fieldset class="form-group">
  <div class="form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" value="" checked="">
      He revisado los cambios y los he aceptado.
    </label>
  </div>
</fieldset>

<button type="submit" class="btn btn-primary btn-lg btn-block">EDITAR CLIENTE</button>
</div>
</form>
@endsection
