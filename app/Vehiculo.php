<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    


    public function revisions()
	{
		return $this->hasMany(Revision::class, 'idvehiculo','idvehiculo');
	}
}
