<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>ParqueSoft</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">ParqueSoft</a>
       
        
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('estudiante.create')}}">Registro de Estudiantes</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('estudiante.lista')}}">Lista de Estudiantes</a>
            </li>
           
          </ul>

         
            
       
           
            </div>

        </div>
       
      </nav>
       
      <br>

     
    
      
      
        @yield('contenido')
      
       <br> 

       
        
     
</body>
<br> <br> <br> <br> <br> <br> 
<footer class="bg-white text-center text-red-50 py-3 shadow">copyright@ {{date('Y')}}  </footer>

</html>