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


}
