<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    
    public function revisions()
	{
		return $this->hasMany(Revision::class, 'idservicio','idservicio');
	}

}
