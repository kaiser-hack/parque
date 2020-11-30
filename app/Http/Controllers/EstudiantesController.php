<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use Carbon\Carbon;

class EstudiantesController extends Controller
{
   // esta linea de codigo solo muestra la vista home en la carpeta views
    public function index()
    {
        return view('home');
    }



   //esta funtion llama a la vista en donde se aloja el formulario (resource/views/create)
    public function create()
    {
        return view('create');
    }

    

    //con esta linea de codigo recogemos los datos del formulario y lo enviamos a la base de datos
    public function store(Request $request)
    {
        //creamos una instaticia del modelo estudiantes
        $estudiante = new Estudiante();
        //en esta linea de codigo uso una fuction de carbon para tomar la fecha y generar 
        $anios= \Carbon\Carbon::parse($request->input('fecha_nacimiento'))->age;

        //en esta linea de codigo tomamos los datos del formulario y lo insertamos en la base de datos y guardamos.
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido = $request->input('apellido');
        $estudiante->correo = $request->input('correo');
        $estudiante->sexo = $request->input('sexo');
        $estudiante->edad = $anios;
          
         //en estas lineas de codigo podemos observar como carbon permite la manipulacion de datos tipos date para la implementacion de funcionalidades
         $date = Carbon::parse($request->input('fecha_nacimiento'));
         $mes = $date->format('m');   
       
         $dia = $date->format('d');
        
         
 
         
        /* 
        estas linea de codigo son los condicionales que nos permite generar el zodiaco segun la condicion
          Aries  (21/3 - 20/4) 
          Tauro  (21/4 - 21/5) 
          Géminis  (22/5 - 20/6) 
          Cáncer  (21/6 - 23/7) 
          Leo (24/7 - 23/8) 
          Virgo  (24/8 - 23/9) 
          Libra  (24/9 - 23/10) 
          Escorpio  (24/10 - 22/11) 
          Sagitario  (23/11 - 21/12) 
          Capricornio  (22/12 - 20/1) 
          Acuario  (21/1 - 19/2) 
          Piscis (20/2 - 20/3) 
         */
 
         $fechadia= $dia;
         $fechames= $mes;
 
         if((($fechadia >= "21") && ($fechames == "3")) or (($fechadia <= "19") && ($fechames == "4"))){
         $signo="Aries <strong>♈</strong>";
         }
         if((($fechadia >= "20") && ($fechames == "4")) or (($fechadia <= "20") && ($fechames == "5"))){
         $signo="Tauro <strong>♉</strong>";
         }
         if((($fechadia >= "21") && ($fechames == "5")) or (($fechadia <= "21") && ($fechames == "6"))){
         $signo="Geminis <strong>♊</strong>";
         }
         if((($fechadia >= "22") && ($fechames == "6")) or (($fechadia <= "22") && ($fechames == "7"))){
         $signo="Cancer <strong>♋</strong>";
         }
         if((($fechadia >= "23") && ($fechames == "7")) or (($fechadia <= "22") && ($fechames == "8"))){
         $signo="Leo <strong>♌</strong>";
         }
         if((($fechadia >= "23") && ($fechames == "8")) or (($fechadia <= "22") && ($fechames == "9"))){
         $signo="Virgo <strong>♍</strong>";
         }
         if((($fechadia >= "23") && ($fechames == "9")) or (($fechadia <= "22") && ($fechames == "10"))){
         $signo="Libra <strong>♎</strong>";
         }
         if((($fechadia >= "23") && ($fechames == "10")) or (($fechadia <= "21") && ($fechames == "11"))){
         $signo="Escorpio <strong>♏</strong>";
         }
         if((($fechadia >= "22") && ($fechames == "11")) or (($fechadia <= "21") && ($fechames == "12"))){
         $signo="Sagitario <strong>♐</strong>";
         }
         if((($fechadia >= "22") && ($fechames == "12")) or (($fechadia <= "19") && ($fechames == "1"))){
         $signo="Capricornio <strong>♑</strong>";
         }
         if((($fechadia >= "20") && ($fechames == "1")) or (($fechadia <= "18") && ($fechames == "2"))){
         $signo="Acuario <strong>♒</strong>";
         }
         if((($fechadia >= "19") && ($fechames == "2")) or (($fechadia <= "20") && ($fechames == "3"))){
         $signo="Piscis <strong>♓</strong>";
         }
         
         $estudiante->signo = $signo;      
        $estudiante->save();

        return redirect()->route('estudiante.lista');

    }

    //esta linea de codigo trae los datos de la base de datos y los listay envia a la vista index
    public function lista()
    {
        $estudiante = Estudiante::get();

        return view('index', compact('estudiante'));

    }

   
    public function show($id)
    {
        // esta fuction busca  los datos por el identificador y lo muestra y los envia a la vista show
        $estudiante = Estudiante::findOrFail($id);

        return view('show', compact('estudiante'));
    }

           // esta fuction busca  los datos por el identificador y lo muestra

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return view('edit', compact('estudiante'));
    }

   //esta linea de codigo toma  los datos del formulario de editar y los cambia en la base de datos
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        $anios= \Carbon\Carbon::parse($request->input('fecha_nacimiento'))->age;

        //en esta linea de codigo tomamos los datos del formulario y lo insertamos en la base de datos y guardamos.
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido = $request->input('apellido');
        $estudiante->correo = $request->input('correo');
        $estudiante->sexo = $request->input('sexo');
        $estudiante->edad = $anios;        
        $estudiante->save();

        return redirect()->route('estudiante.lista');
    }

   //esta linea de codigo elimina los datos por el id 
     
    public function destroy($id)
    {
        
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        return redirect()->route('estudiante.lista');
    }
}
