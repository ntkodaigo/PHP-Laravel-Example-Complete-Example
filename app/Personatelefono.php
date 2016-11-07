<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personatelefono extends Model
{
	protected $table ='personatelefono';
	protected $primaryKey = 'idpersonatelefono'; 	
	protected $fillable = ['idpersona','idtipotelefono','numeropersonatelefono'];
	public $timestamps = false;


    public function anexotelefonos()
	{
		return $this->hasMany(Anerxotelefono::class, 'idpersonatelefono','idpersonatelefono');
	}

	public function personatelefonos()
	{
		return $this->belongsToMany(Personatelefono::class, 'idtipotelefono','idtipotelefono');
	}

	public function personas()
	{
		return $this->belongsToMany(Persona::class, 'idpersona','idpersona');
	}
}
