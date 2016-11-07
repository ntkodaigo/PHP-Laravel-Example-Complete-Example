<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $table='cliente';
	protected $primaryKey='idcliente';

    

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

	public function cliente()
	{
		return $this->hasOne(Cliente::class, 'idpersona', 'idcliente');
	}


}
