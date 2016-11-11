<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table ='persona';
	protected $primaryKey = 'idpersona'; 
	protected $fillable = ['idpersona'];
	public $timestamps = false;

	public function correoelectronicos()
	{
		return $this->hasMany(Correoelectronico::class, 'idpersona', 'idpersona');
	}

	public function direccionpersonas()
	{
		return $this->hasMany(Direccionpersona::class, 'idpersona', 'idpersona');
	}

	public function cliente()
	{
		return $this->hasOne(Cliente::class, 'idcliente', 'idpersona');
	}

	public function provedor()
	{
		return $this->hasOne(Proveedor::class, 'idproveedor', 'idpersona');
	}

	public function personanatural()
	{
		return $this-> hasOne(Personanatural::class,'idpersonanatural','idpersona');
	}	

	public function personajuridica()
	{
		return $this-> hasOne(Personajuridica::class,'idpersonajuridica','idpersona');
	}	

	public function personatelefonos()
	{
		return $this->hasMany(Personatelefono::class, 'idpersona', 'idpersona');
	}

	public function nacimientocreacion()
	{
		return $this-> hasOne(Nacimientocreacion::class,'idpersona','idpersona');
	}

}
