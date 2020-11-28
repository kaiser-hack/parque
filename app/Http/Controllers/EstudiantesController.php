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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
        $estudiante->save();

        return redirect()->route('estudiante.lista');

    }

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
