<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table ='marca';
	protected $primaryKey = 'idmarca'; 	
	protected $fillable = ['nombremarca'];
	public $timestamps = false;

	public function modelos()
	{
		return $this->hasMany(Modelo::class, 'idmarca', 'idmarca');
	}
}
