<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personajuridica extends Model
{
	public static $entityName = "Persona Jurídica";

    protected $table ='personajuridica';
	protected $primaryKey = 'idpersonajuridica'; 	
	protected $fillable = ['razonsocial', 'ruc'];
	public $timestamps = false;
	public $incrementing = false;

	public function persona()
	{
		return $this->hasOne(Persona::class, 'idpersona', 'idpersonajuridica');
	}

	public function mypersona()
	{
		return $this->morphOne(Persona::class, 'personabytype', 'persona_type', 'idpersona', 'idpersonajuridica');
	}

	public function impuestofechas()
	{
		return $this->belongsToMany(Impuestofecha::class, 'personajuridicaimpuestofecha', 'idpersonajuridica', 'idimpuestofecha');
	}
}
