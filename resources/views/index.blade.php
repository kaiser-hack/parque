@extends('welcome')

@section('contenido')
<div class="container  bg-white  py-2 px-3 shadow rounded  ">


   <a href=" {{route('estudiante.create')}} "> <button class="btn btn-primary" >+Agregar Estudiante</button></a>

    <br>
    <hr>

    


<table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Correo</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($estudiante as $item)
      <tr>
        <td > {{$item->id}} </td>
        <td><a href="{{route('estudiante.show', $item)}} ">{{$item->nombre}}</a></td>
        <td>{{$item->apellido}}</td>
        <td>{{$item->correo}}</td>
        <td>  <div class="btn-toolbar">  
            <a href="{{route('estudiante.edit', $item->id)}}"><button class="btn btn- btn-success mx-1">Editar</button></a>
            
            <form action="{{route('estudiante.destroy',  $item->id)}}" method="POST">
                    @csrf
                   @method('DELETE')
              
                    <button class="btn btn- btn-danger" type="submit">Eliminar</button>
            </form>
        </div></td>
        @endforeach
      </tr>

    </tbody>
  </table>
</div>


@endsection