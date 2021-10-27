@extends('layouts.plantillabase');

@section('contenido')
<h1>Crear Registros</h1>
<form action="/usuarios" method="POST">
@csrf
<div class="mb-3">
  <label for="" class="form-label">Nombre:</label>
  <input id="nombre" name="nombre" type="text" class="form-control" tabindex=1 placeholder="Nombre...">
</div>
<div class="mb-3">
  <label for="" class="form-label">Apellido:</label>
  <input id="apellido" name="apellido" type="text" class="form-control" tabindex=2 placeholder="Apellido...">
</div>
<div class="mb-3">
  <label for="" class="form-label">Correo:</label>
  <input id="correo" name="correo" type="text"  class="form-control" tabindex=3 placeholder="Correo...">
</div>
<div class="mb-3">
  <label for="" class="form-label">Fecha de Nacimiento:</label>
  <input id="fecha_nacimiento" name="fecha_nacimiento" type="date"  class="form-control" tabindex=4 placeholder="">
</div>



<a href="/usuarios" class="btn btn-secondary" tabindex=5>Cancelar</a>
<button type="submit" class="btn btn-primary" tanindex="4" >Guardar</button>

</form>
@endsection