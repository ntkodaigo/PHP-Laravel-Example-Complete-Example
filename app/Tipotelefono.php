<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipotelefono extends Model
{
    protected $table ='tipotelefono';
	protected $primaryKey = 'idtipotelefono'; 	
	protected $fillable = ['nombretipotelefono'];
	public $timestamps = false;

	public function vehiculos()
	{
		return $this->belongsToMany(Vehiculo::class, 'idcliente','idcliente');
	}

	public function personatelefono()
	{
		return $this->belongsToMany(Personatelefono::class, 'idtipotelefono','idtipotelefono');
	}

	public function persona()
	{
		return $this->belongsToMany(Persona::class, 'idpersona','idpersona');
	}

}
