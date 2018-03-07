<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
	protected $table = 'provincias';
	protected $fillable = ['id','nombre'];


    public function personas(){
    	$this->hasMany('App/Persona'); //Esta Provincia tiene muchas personas
    }
}
