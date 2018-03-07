<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Provincia;
use Auth; //Crea en la BD el id del usuario que esta almacenando una persona
use Illuminate\Http\Request;
use DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {            
         //Traer nombre de provincias para filtrar por provincias
        $listaprovincias = Provincia::leftJoin('personas', 'provincias.id', '=', 'personas.id')
        ->select('provincias.id','provincias.nombre as nombre_prov')
        ->get();
          
        //Para colocar el nombre de prov en lugar de que aparezca ID en la lista
        $listapersonas = Persona::join('provincias', 'personas.provincia_id', '=', 'provincias.id')
            ->select('personas.*', 'provincias.nombre as nombre_prov') //as cambia el nombre de la columna
            ->get(); //Trae todo, en first solo traia el primero

        //dd($listapersonas, $listaprovincias); 
        return view('persona.listar', ['listapersonas' => $listapersonas, 'listaprovincias' => $listaprovincias]);
                      //vista          //variable

        
    }



     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Traer nombre de provincias para formulario para elegir provincia //Trae todo con Left Join
        $listaprovincias = Provincia::leftJoin('personas', 'provincias.id', '=', 'personas.id')
        ->select('provincias.id','provincias.nombre as nombre_prov')
        ->get();

        return view('persona.create', ['listaprovincias' => $listaprovincias]);

        return view('persona.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       //$request->file('foto')->store('public'); //guardar en carpeta public de storage/app
       //Validaciones
            $this->validate($request, ['apellido' => 'required|string','nombre' => 'required|string','dni' => 'required|integer|max:99999999','direccion' => 'required|string','foto' => 'required|image', 'provincia_id' => 'required','fecha_nac' => 'required']);

        //Almacenamiento
            $var_persona = new Persona;
            $var_persona->apellido /*apellido, de la tabla*/ = $request->apellido; /*apellido, del formulario*/  
            //asigna lo que trae el request, al elemento de la BD
            $var_persona->nombre = $request->nombre;
            $var_persona->dni = $request->dni;
            $var_persona->fecha_nac = $request->fecha_nac;
            $var_persona->direccion = $request->direccion;
            $var_persona->provincia_id = $request->provincia_id;
            $var_persona->foto =  $request->file('foto')->store('public');
            //$var_persona->foto = $request->foto;
            $var_persona->save();


        //Redireccion  al usuario al formulario de persona.create
            return redirect()->route('persona.create')->with('message', 'Se ha almacenado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        
        $persona = Persona::join('provincias', 'personas.provincia_id', '=', 'provincias.id')
            ->select('personas.*', 'provincias.nombre as nombre_prov') //as cambia el nombre de la columna
            ->where('personas.id','=', $id)
            ->first();

        return view('persona.show', ['persona' => $persona]); //Sacado de documentacion de Laravel 5.6
        //Los datos de la persona que se esta trabajando van a estar disponibles desde la vista;
        
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $persona = Persona::find($id);
        /*return view('persona.editar',compact('persona','id'));
        return view('persona.editar',compact('persona','apellido'));
        return view('persona.editar',compact('persona','nombre')); 
        return view('persona.editar',compact('persona','dni')); 
        return view('persona.editar',compact('persona','fecha_nac'));
        return view('persona.editar',compact('persona','provincia_id'));
        return view('persona.editar',compact('persona','foto'));*/

        /*VER ID's EN FORMULARIO UPDATE*/
        //Traer nombre de provincias para formulario para elegir provincia //Trae todo con Left Join
        $listaprovincias = Provincia::leftJoin('personas', 'provincias.id', '=', 'personas.id')
        ->select('personas.*','provincias.id','provincias.nombre as nombre_prov')
        ->get();

        return view('persona.editar', compact('persona','id'),['listaprovincias'=>$listaprovincias]);

        /*return view('persona.editar',compact('persona','apellido'));
        return view('persona.editar',compact('persona','nombre')); 
        return view('persona.editar',compact('persona','dni')); 
        return view('persona.editar',compact('persona','fecha_nac'));
        return view('persona.editar',compact('persona','provincia_id'));
        return view('persona.editar',compact('persona','foto'));*/


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  //dd($request);
        $persona = Persona::find($id);
       //NO DEJABA ACTUALIZAR CON VALIDACIONES, ahora valida el HTML
       // $this->validate($request, ['apellido' => 'required|string','nombre' => 'required|string','dni' => 'required|integer|max:99999999','direccion' => 'required|string','foto' => 'required|image', 'provincia_id' => 'required','fecha_nac' => 'required']);
        
        //ACTUALIZACION
       /* $persona->apellido = $request->get('apellido');
        $persona->nombre = $request->get('nombre');
        $persona->dni = $request->get('dni');
        $persona->fecha_nac = $request->get('fecha_nac');
        $persona->direccion = $request->get('direccion');
        $persona->provincia_id = $request->get('provincia_id');
        $persona->foto = $request->get('foto');
        $persona->save();*/
        $persona->update($request->all());
        $persona->foto =  $request->file('foto')->store('public');
        $persona->save(); //Para el Update necesitaba esta linea ademas de la line propia de update
       
            

        return redirect()->route('persona.index')
                        ->with('message_persona','Persona actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {   
       $persona->delete(); 
       return redirect()->route('persona.index')->with('message', 'Se ha eliminado correctamente'); //Redirige al listado
       

    }

   
}
