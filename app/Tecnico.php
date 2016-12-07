<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
	public static $entityName = 'Técnico';

   	protected $table ='tecnico';
	protected $primaryKey = 'idtecnico'; 	
	public $incrementing = false;
	public $timestamps = false;

    public function personanatural()
	{
		return $this -> hasOne(Personanatural::class,'idpersonanatural','idtecnico');
	}

	public function revisions()
	{
		return $this -> hasMany(Revision::class,'idtecnico','idtecnico');
	}

	public function persona()
	{
		return $this->hasOne(Persona::class, 'idpersona', 'idtecnico');
	}
}
