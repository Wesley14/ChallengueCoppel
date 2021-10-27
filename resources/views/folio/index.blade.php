@extends('layouts.plantillabase');

@section('contenido')
<a href="folios/create" class="btn btn-dark">Nuevo Folio</a>

<table class="table table-dark table-striped mt-4">
  <thead>
      <tr>
          <th scope="col">Folio</th>
          <th scope="col">Titulo</th>
          <th scope="col">Autor</th>
          <th scope="col">Responsable</th>
          <th scope="col">Descripción</th>
          <th scope="col">Fecha Resolución</th>
          <th scope="col">Estatus</th>
          <th scope="col">Acciones</th>
         
          <tbody>
          @foreach($folios as $folio)
              <tr>
                  
                  <td>{{$folio->codigo}}</td>
                  <td>{{$folio->titulo}}</td>
                  <td>{{$folio->autor}}</td>
                  <td>{{$folio->nombre_responsable}}</td>
                  <td>{{$folio->descripcion}}</td>
                  <td>{{$folio->fecha_esp_resolucion}}</td>
                  <td>{{$folio->estatus}}</td>


                  <td>
                      <form action="{{route ('folios.destroy', $folio->id)}}" method="POST">
                        <a href="/folios/{{$folio->id}}/edit" class="btn btn-info">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Borrar</button>
                    </form>

                  </td>
              </tr>
              @endforeach
          </tbody>
          </tbody>

      </tr>
  </thead>
</table>
@endsection