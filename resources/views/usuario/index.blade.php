@extends('layouts.plantillabase');

@section('contenido')
<a href="usuarios/create" class="btn btn-dark">Nuevo</a>

<table class="table table-dark table-striped mt-4">
  <thead>
      <tr>
          
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Correo</th>
          <th scope="col">Fecha Nacimiento</th>
          <th scope="col">Acciones</th>
          <tbody>
              @foreach($usuarios as $usuario)
              <tr>
                  
                  <td>{{$usuario->nombre}}</td>
                  <td>{{$usuario->apellido}}</td>
                  <td>{{$usuario->correo}}</td>
                  <td>{{$usuario->fecha_nacimiento}}</td>
                  <td>
                      <form action="{{route ('usuarios.destroy', $usuario->id)}}" method="POST">
                        <a href="/usuarios/{{$usuario->id}}/edit" class="btn btn-info">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Borrar</button>
                    </form>

                  </td>
              </tr>
              @endforeach
          </tbody>

      </tr>
  </thead>
</table>
@endsection