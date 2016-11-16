<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacimientocreacion extends Model
{
    protected $table = 'nacimientocreacion';
	protected $primaryKey = 'idpersona'; 	
	protected $fillable = ['idpersona', 'fechanacimientocreacion'];
	public $timestamps = false;
	public $incrementing = false;

	public function persona()
	{
		return $this->hasOne(Persona::class, 'idpersona', 'idpersona');
	}
}
