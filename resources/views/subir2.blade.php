@extends('layouts.app')
@section('content')
<form method="POST" action="/masiva" accept-charset="UTF-8" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">Nuevo Archivo</label>
        <div class="col-md-6">
            <input type="file" class="form-control" name="file" >
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
@endsection