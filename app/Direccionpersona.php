<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccionpersona extends Model
{
    protected $table ='direccionpersona';
	protected $primaryKey = 'iddireccionpersona'; 	
	protected $fillable = ['idpersona','idpais', 'iddepartamento','idprovincia','iddistrito','nombredireccionpersona'];
	public $timestamps = false;

	
	public function pais()
	{
		return $this->hasOne(Pais::class, 'idpais','idpais');
	}

	public function departamento()
	{
		return $this->hasOne(Departamento::class, 'iddepartamento','iddepartamento');
	}

	public function provincia()
	{
		return $this->hasOne(Provincia::class, 'idprovincia','idprovincia');
	}

	public function distrito()
	{
		return $this->hasOne(Distrito::class, 'iddistrito','iddistrito');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idpersona');
	
	}

}
