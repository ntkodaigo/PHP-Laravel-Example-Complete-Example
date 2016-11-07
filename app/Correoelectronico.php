<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correoelectronico extends Model
{
    protected $table ='correoelectronico';
	protected $primaryKey = 'idcorreoelectronico'; 	
	protected $fillable = ['idpersona', 'direccioncorreoelectronico'];
	public $timestamps = false;

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idpersona');
	}
}
