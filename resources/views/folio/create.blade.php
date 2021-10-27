@extends('layouts.plantillabase');

@section('contenido')
<h1>Crear Folio</h1>
<form action="/folios" method="POST">
@csrf

<form>
  <div class="mb-3">
    <input id="codigo" name="codigo" type="hidden" class="form-control"  value="{{$cod}}" tabindex=1>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Titulo:</label>
    <input id="titulo" name="titulo" type="text" class="form-control" tabindex=1 placeholder="Ingrese titulo del folio...">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Autor:</label>
    <select class="form-control"  id="autor" name="autor">
      <option value="0">root</option>
      @foreach($usuarios as $usuario)
        <option value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
      @endforeach
      
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Responsable:</label>
    <select class="form-control" id="exampleFormControlSelect1" id="responsable" name="responsable">
    <option value="0">root</option>
    @foreach($usuarios as $usuario)
        <option value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
      @endforeach
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control"  id="descripcion" name="descripcion" rows="3"></textarea>
  </div>
  <div class="mb-3">
     <label for="" class="form-label">Fecha de resolución:</label>
     <input id="fecha_resolucion" name="fecha_resolucion" type="date"  class="form-control" tabindex=4 placeholder="">
</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">Estatus</label>
    <select class="form-control"  id="estatus" name="estatus">
     
        <option value="{{$estatus->id}}">{{$estatus->nombre}}</option>
     
    </select>
  </div>
<br>
 <a href="/folios" class="btn btn-secondary" tabindex=5>Cancelar</a>
 <button type="submit" class="btn btn-primary" tanindex="4" >Guardar</button>

</form>
@endsection