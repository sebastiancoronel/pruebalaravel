<?php

namespace App\Http\Controllers;

use App\Provincia;
use Illuminate\Http\Request;
use DB;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('provincia.listar',['listaprovincias' => Provincia::All()]);
       
    }                                       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provincia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        $this->validate($request,['nombre' =>'required|string']);
        //Almacenamiento
        $var_provincia = new Provincia;
        $var_provincia->nombre = $request->nombre;
        $var_provincia->save();
        //Redireccion  al usuario al formulario de provincia.create
        return redirect()->route('provincia.create')->with('message', 'Se ha almacenado correctamente la provincia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        //ppp = Persona por provincia en vista show_provincia.blade.php
        $ppp = Provincia::join('personas', 'provincias.id', '=', 'personas.provincia_id')
            ->select('personas.*','provincias.nombre as nombre_prov')
            ->where('personas.provincia_id','=', $id)
            ->get(); //Trae todo, en first solo traia el primero
         // dd($ppp);
        return view('provincia.show_provincia', ['ppp' => $ppp]);
                      //vista          //variable

    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provincia = Provincia::find($id);
        
        return view('provincia.editar',compact('provincia','id'));
        return view('provincia.editar',compact('provincia','nombre'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provincia = Provincia::find($id);
        //Validacion del nombre
        $this->validate($request, ['nombre'=>'required|string']);
        
        //ACTUALIZACION
        $provincia->update($request->all());
        return redirect()->route('provincia.index')
                        ->with('message_provincia','Provincia actualizada');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $provincia = Provincia::find($id);
        //dd($provincia);
        $provincia->delete();
        return redirect()->action('ProvinciaController@index')->with('message', 'Se ha eliminado la provincia');
    }
}
