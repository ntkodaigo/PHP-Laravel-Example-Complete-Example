<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table ='distrito';
	protected $primaryKey = 'iddistrito'; 	
	protected $fillable = ['idpais', 'iddepartamento','idprovincia','nombredistrito'];
	public $timestamps = false;

	
	public function pais()
	{
		return $this->belongsTo(Pais::class, 'idpais');
	}

	public function departamento()
	{
		return $this->belongsTo(Departamento::class, 'iddepartamento');
	}

	public function provincia()
	{
		return $this->belongsTo(Provincia::class, 'idprovincia');
	}

	public function direccionpersonas()
	{
		return $this->hasMany(Direccionpersona::class, 'iddistrito', 'iddistrito');
	}	
	
}
