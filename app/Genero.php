<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table ='genero';
	protected $primaryKey = 'idgenero'; 	
	protected $fillable = ['nombregenero'];
	public $timestamps = false;

	public function personanaturals()
	{
		return $this-> belongsToMany(Personanatural::class,'personanaturalgenero','idpersonanatural','idgenero');
	}
}
