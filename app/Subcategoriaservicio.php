<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoriaservicio extends Model
{
    protected $table ='subcategoriaservicio';
	protected $primaryKey = 'idsubcategoriaservicio'; 	
	protected $fillable = ['idcategoriaservicio', 'nombresubcategoriaservicio'];
	public $timestamps = false;

	public function categoriaservicio()
	{
		return $this->belongsTo(Categoriaservicio::class, 'idsubcategoriaservicio','idsubcategoriaservicio');
	}

	public function servicios
	{
		return $this->hasMany(Servicio::class, 'idsubcategoriaservicio','idsubcategoriaservicio');
	}
}
