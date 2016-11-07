<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
<<<<<<< HEAD
    
    public function revisions()
	{
		return $this->hasMany(Revision::class, 'idservicio','idservicio');
	}

=======
    protected $table ='servicio';
	protected $primaryKey = 'idservicio'; 	
	protected $fillable = ['idcategoriaservicio', 'idsubcategoriaservicio','nombreservicio'];
	public $timestamps = false;

	public function subcategoriaservicio()
	{
		return $this->belongsTo(Subcategoriaservicio::class, 'idsubcategoriaservicio');
	}

	public function articulo()
	{
		return $this->hasOne(Articulo::class, 'idarticulo','idservicio');
	}
>>>>>>> origin/master
}
