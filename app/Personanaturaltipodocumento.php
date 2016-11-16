<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personanaturaltipodocumento extends Model
{
    protected $table ='personanaturaltipodocumento';
	protected $fillable = ['idpersonanatural','idtipodocumento','numerodocumento'];
	public $timestamps = false;
	public $timestamps = false;

	public function personanaturals()
	{
		return $this-> belongsTo(Personanatural::class,'idpersonanatural','idpersonanatural');
	}

	public function tipodocumentos()
	{
		return $this-> belongsTo(Personanatural::class,'idtipodocumento','idtipodocumento');
	}
}
