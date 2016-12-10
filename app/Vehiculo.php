<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    
	protected $table ='vehiculo';
	protected $primaryKey = 'idvehiculo'; 	
	protected $fillable = ['idmarca','idmodelo','aniovehiculo', 'numeroplacavehivulo', 'descripcion'];
	public $timestamps = false;
	public $incrementing = false;

    public function clientes()
	{
		return $this->belongsToMany(Cliente::class, 'clientevehiculo', 'idvehiculo','idcliente')->withPivot('idmarca','idmodelo');
	}

	public function modelo()
	{
		return $this->belongsTo(Modelo::class, 'idmodelo', 'idmodelo');
	}

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'idmarca', 'idmarca');
	}

	public function revisions()
	{
		return $this->hasMany(Revision::class, 'idvehiculo','idvehiculo');
	}

	public function deleteWithAllClientes()
	{
		$this->clientes()->detach();

		$this->delete();
	}
}
