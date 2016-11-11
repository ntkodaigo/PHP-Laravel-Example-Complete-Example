<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriaservicio extends Model
{
    protected $table ='categoriaservicio';
	protected $primaryKey = 'idcategoriaservicio'; 	
	protected $fillable = ['nombrecategoriaservicio'];
	public $timestamps = false;

	public function subcategoriaservicios()
	{
		return $this->hasMany(subcategoriaservicio::class, 'idcategoriaservicio','idcategoriaservicio');
	}
}
