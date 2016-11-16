<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	public static $entityName = 'Cliente';

	protected $table='cliente';
	protected $primaryKey='idcliente';
	public $timestamps = false;
	public $incrementing = false;

    public function revisions()
	{
		return $this->hasMany(Revision::class, 'idcliente','idcliente');
	}

	 public function vehiculos()
	{
		return $this->belongsToMany(Vehiculo::class, 'idcliente','idcliente');
	}

	public function factura()
	{
		return $this->hasMany(Factura::class, 'idcliente','idcliente');
	}

	public function persona()
	{
		return $this->hasOne(Cliente::class, 'idpersona', 'idcliente');
	}
}
