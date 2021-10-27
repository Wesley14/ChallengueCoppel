@extends('layouts.plantillabase');

@section('contenido')
<h1>Crear Folio</h1>
<form action="/folios/{{$folio->id}}" method="POST">
@csrf
@method('PUT')
<form>
  <div class="form-group">
    <label for="" class="form-label">Folio:</label>
    <input id="codigo" name="codigo" type="text" class="form-control" tabindex=1 placeholder="Ingrese titulo del folio..." value="{{$folio->codigo}}" disabled>
  </div>
  <div class="form-group">
    <label for="" class="form-label">Titulo:</label>
    <input id="titulo" name="titulo" type="text" class="form-control" tabindex=1 placeholder="Ingrese titulo del folio..." value="{{$folio->titulo}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Autor:</label>
    <select class="form-control" id="" id="autor" name="autor" value="{{$folio->autor_id}}">
      <option value="0">root</option>
      @foreach($usuarios as $usuario)
       @if($usuario->id == $folio->autor_id)
        <option selected="selected" value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
        @else
        <option  value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
       @endif
      @endforeach
      
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Responsable:</label>
    <select class="form-control" id="" id="responsable" name="responsable">
    <option value="0">root</option>
    @foreach($usuarios as $usuario)
       @if($usuario->id == $folio->responsable_id)
        <option selected="selected" value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
        @else
        <option  value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
       @endif
      @endforeach
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control"  id="descripcion" name="descripcion" rows="3" >{{$folio->descripcion}}</textarea>
  </div>
  <div class="mb-3">
     <label for="" class="form-label">Fecha de resolución:</label>
     <input id="fecha_resolucion" name="fecha_resolucion" type="date"  class="form-control" value="{{$folio->fecha_esp_resolucion}}">
</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">Estatus</label>
    <select class="form-control"  id="estatus" name="estatus">
    @foreach($estatuses as $estatus)
       @if($estatus->id == $folio->estatus_id)
        <option selected="selected" value="{{$estatus->id}}">{{$estatus->nombre}}</option>
        @else
        <option  value="{{$estatus->id}}">{{$estatus->nombre}}</option>
       @endif
      @endforeach
    </select>
  </div>
<br>
 <a href="/folios" class="btn btn-secondary" tabindex=5>Cancelar</a>
 <button type="submit" class="btn btn-primary" tanindex="4" >Guardar</button>

</form>
@endsection