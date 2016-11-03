<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table ='departamento';
	protected $primaryKey = 'iddepartamento'; 	
	protected $fillable = ['idpais', 'nombredepartamento'];
	public $timestamps = false;

	public function pais()
	{
		return $this->belongsTo(Pais::class, 'idpais');
	}


	public function provincias()
	{
		return $this->hasMany(Provincia::class, 'iddepartamento', 'iddepartamento');
	}
}
