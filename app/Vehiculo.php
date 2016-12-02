<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    
	protected $table ='vehiculo';
	protected $primaryKey = 'idvehiculo'; 	
	protected $fillable = ['idmarca','idmodelo','añovehiculo'];
	public $timestamps = false;

    public function cliente()
	{
		return $this->belongsToMany(Cliente::class, 'idvehiculo','idvehiculo');
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
}
