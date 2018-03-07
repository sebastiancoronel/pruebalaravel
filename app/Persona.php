<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	//A que tabla hace referencia este modelo Persona
    protected $table = 'personas';

    //Campos que puede completar el usuario a partir de una peticion del navegador;

    protected $fillable = ['apellido', 'nombre','foto', 'dni', 'fecha_nac','direccion', 'provincia_id'];

    //Relaciones de Personas a Provincias
    public function Provincia()
    {
    	$this->HasOne('App/Provincia','provincia_id'); //Esta persona tiene una provincia
    }

     public function scopeName($query, $name)
    {
         $query->where('nombre', $name);
    }


}
