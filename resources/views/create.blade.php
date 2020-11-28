@extends('welcome')

@section('contenido')
    

<form  class="bg-white py-2 px-4  shadow rounded" action=" {{route('estudiante.store')}}"  method="POST" >
    @csrf

<div class="container" >

    <h2 class="dispaly-4"> Registrar Nuevo Estudiante</h2>
    <hr>

    <div class="row y-2 " >

    <label for="nombre">Nombre</label>

    <input class=" m-2 bg-primary form-control border-0 bg-light shadow-sm"
    id="nombre" type="text" name="nombre" placeholder="nombre">

    <label for="apellido">Apellido</label>

    <input class=" m-2 bg-primary form-control border-0 bg-light shadow-sm"
    id="apellido" type="text" name="apellido" placeholder="apellido">


    <label for="fecha_nacimiento">Fecha de Nacimiento</label>

    <input class="m-2 bg-primary form-control border-0 bg-light shadow-sm"
    id="fecha_nacimiento" type="date" name="fecha_nacimiento" placeholder="fecha de nacimiento">


    <label for="cedula">Correo</label>

    <input class="m-2 bg-primary form-control border-0 bg-light shadow-sm"
    id="cedula" type="text" name="correo" placeholder="correo">

<label for="sexo">Sexo</label>
   <select class=" col-7 m-1 py-1 bg-primary form-control border-0 bg-light shadow-sm"  name="sexo" id="">
    <option value="">Selecciona una opcion</option>
       <option value="Masculino">Masculino</option>
       <option value="Femenino ">Femenino</option>
   </select>

    <br>

    <button class="btn btn-success btn-block my-2">Guardar</button>

</div>
</div>
    

</form>
    
@endsection