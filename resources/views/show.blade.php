@extends('welcome')

@section('contenido')
<div class="container  bg-white  py-2 px-3 shadow rounded  ">

<h3>Hola, {{$estudiante->nombre}}</h3>
<br>

<p>Segun los datos que nos has proporcionado sabemos que tienes, {{$estudiante->edad}} años de edad </p>

<p>tu correo es: {{$estudiante->correo}}  y tu sexo es {{$estudiante->sexo}} </p>


 



@if ($estudiante->edad >= 18)
<center> <h4 style="color:red" >"Eres, mayor de edad"</h4> </center>
@else
<center> <h4 style="color:blue">"NO, eres mayor de edad"</h4> </center>
@endif
    

 


</div>

@endsection