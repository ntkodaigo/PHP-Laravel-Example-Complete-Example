<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personanatural extends Model
{
   	protected $table ='personanatural';
	protected $primaryKey = 'idpersonatural'; 	
	protected $fillable = ['nombres','apellido paterno','apellido materno'];
	public $incrementing = false
	public $timestamps = false;

	public function persona()
	{
		return $this-> hasOne(Persona::class,'idpersona','idpersonanatural');
	}	


   	public function tipoprofesions()
	{
		return $this -> belongsToMany(Personanatural::class,'personanaturaltipoprofesion','idpersonatural','idtipoprofesion');

	}

	public function tecnico()
	{
		return $this-> hasOne(Tecnico::class,'idtecnico','idpersonanatural');
	}

	public function generos()
	{
		return $this-> belongsTo(Genero::class,'idgenero','idpersonanatural');
	}

	public function personanaturaltipodocumento()
	{
		return $this-> hasMany(Personanaturaltipodocumento::class,'idpersonanatural','idpersonanatural');
	}







}
