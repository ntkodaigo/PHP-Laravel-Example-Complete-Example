<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodocumento extends Model
{
    protected $table ='tipodocumento';
	protected $primaryKey = 'idtipodocumento'; 	
	protected $fillable = ['nombretipodocumento'];
	public $timestamps = false;

	public function personanaturaltipodocumento()
	{
		return $this-> hasMany(Personanaturaltipodocumento::class,'idtipodocumento','idtipodocumento');
	}


}
