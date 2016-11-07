<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
   	protected $table ='tecnico';
	protected $primaryKey = 'idtecnico'; 	
	public $incrementing = false
	public $timestamps = false;


    public function personanatural()
	{
		return $this -> hasOne(Personanatural::class,'idpersonatural','idtecnico');

	}

	public function revisions()
	{
		return $this -> hasMany(Revision::class,'idtecnico','idtecnico');
	}

	public function revisions()
	{
		return $this -> hasMany(Revision::class,'idtecnico','idtecnico');
	}
}
