<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table ='provincia';
	protected $primaryKey = 'idprovincia'; 	
	protected $fillable = ['idpais', 'iddepartamento', 'nombreprovincia'];
	public $timestamps = false;

	
	public function pais()
	{
		return $this->belongsTo(Pais::class, 'idpais');
	}


	public function departamento()
	{
		return $this->belongsTo(Departamento::class, 'iddepartamento');
	}

	public function distritos()
	{
		return $this->hasMany(Distrito::class, 'idprovincia', 'idprovincia');
	}

	

}
