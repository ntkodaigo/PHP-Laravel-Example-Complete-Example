<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table ='servicio';
	protected $primaryKey = 'idservicio'; 	
	protected $fillable = ['idcategoriaservicio', 'idsubcategoriaservicio','nombreservicio'];
	public $timestamps = false;

	public function revisions()
	{
		return $this->hasMany(Revision::class, 'idservicio','idservicio');
	}
	
	public function subcategoriaservicio()
	{
		return $this->belongsTo(Subcategoriaservicio::class, 'idsubcategoriaservicio');
	}

	public function articulo()
	{
		return $this->hasOne(Articulo::class, 'idarticulo','idservicio');
	}
}
