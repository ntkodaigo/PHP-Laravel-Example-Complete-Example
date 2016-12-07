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

	public function revisionsOfVehiculo($idvehiculo)
	{
		return $this->revisions()->where('idvehiculo', $idvehiculo);
	}

	public function vehiculos()
	{
		return $this->belongsToMany(Vehiculo::class, 'clientevehiculo', 'idcliente','idvehiculo')->withPivot('idmarca','idmodelo');
	}

	public function vehiculosWithPivot()
	{
		return $this->vehiculos()->with('marca', 'modelo')->get();
	}

	public function factura()
	{
		return $this->hasMany(Factura::class, 'idcliente','idcliente');
	}

	public function persona()
	{
		return $this->hasOne(Persona::class, 'idpersona', 'idcliente');
	}

	public function exitsVehiculo($v)
	{
		return $this->vehiculos->contains($v);
	}

	public function saveVehiculo($v)
	{
		$v = Vehiculo::find($v);
		$this->vehiculos()->attach($v, array('idmarca' => $v->idmarca, 'idmodelo' => $v->idmodelo));
	}

	public function updateVehiculo($v)
	{
		$this->vehiculos()->updateExistingPivot($v, array('idmarca' => $v->idmarca, 'idmodelo' => $v->idmodelo));
	}

	public function deleteVehiculo($v)
	{
		$this->vehiculos()->detach($v);
	}
}
