<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    

    public function revisions()
	{
		return $this->hasMany(Revision::class, 'idcliente','idcliente');
	}
}
