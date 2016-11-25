<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table ='persona';
	protected $primaryKey = 'idpersona'; 
	protected $fillable = ['idpersona'];
	public $timestamps = false;
	public $incrementing = false;

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

	public function personatelefonosWithPivot()
	{
		return $this->belongsToMany(Tipotelefono::class, 'personatelefono','idpersona', 'idtipotelefono')->withPivot(['idpersonatelefono', 'numeropersonatelefono']);
	}

	public function nacimientocreacion()
	{
		return $this-> hasOne(Nacimientocreacion::class,'idpersona','idpersona');
	}

	public function savePersonaTelefono($tt, $numeroPerTelf)
	{
		$lastEntity = Personatelefono::orderBy('idpersonatelefono', 'desc')->first();
    	$newId = ($lastEntity == null) ? 1 : $lastEntity->idpersonatelefono + 1;
    	
    	$pt = new Personatelefono;
    	$pt->idpersonatelefono = $newId;
    	$pt->idtipotelefono = $tt;
 		$pt->numeropersonatelefono = $numeroPerTelf;

		$this->personatelefonos()->save($pt);
	}

	public function updatePersonaTelefono($pt, $tt, $numeroPerTelf)
	{
		$pt = $this->personatelefonos()->find($pt);
		$pt->idtipotelefono = $tt;
		$pt->numeropersonatelefono = $numeroPerTelf;

		$this->personatelefonos()->save($pt);
	}
}
