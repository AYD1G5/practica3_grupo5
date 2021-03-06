@extends('layouts.app')
@section('content')

<div class="jumbotron">
  <h1 class="display-3">Creación de Productos</h1>
  <p class="lead">Ingrese la información necesaria para crear un nuevo producto:</p>
  <hr class="my-4">
  
  <form method="POST" accept-charset="UTF-8" enctype="multipart/form-data">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
  <label class="col-form-label" for="inputDefault">Nombre de Producto</label>
  <input name="nombre" type="text" class="form-control" placeholder="Nombre" id="nombre">
</div>

<div class="form-group">
  <label class="col-form-label" for="inputDefault">Descripción de Producto</label>
  <input name="desc" type="text" class="form-control" placeholder="Descripción" id="desc">
</div>

<div class="form-group">
  <label class="col-form-label" for="inputDefault">Cantidad Disponible</label>
  <input name="cantidad" type="text" class="form-control" placeholder="Cantidad" id="cant">
</div>

<div class="form-group">
      <label for="exampleInputFile">Imagen de Producto</label>
      <input type="file" class="form-control-file" name="archivo" id="file" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">Seleccione una imagen para el producto que se está creando.</small>
</div>

<div class="form-group">
  <label class="control-label">Precio del prducto</label>
  <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Q.</span>
      </div>
      <input name="float" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id = "prec">
      <div class="input-group-append">
        <span class="input-group-text">.00</span>
      </div>
    </div>
  </div>
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

<button id = "editar" name = "editar" type="submit" class="btn btn-primary btn-lg btn-block">EDITAR CLIENTE</button>
</div>
</form>



@endsection