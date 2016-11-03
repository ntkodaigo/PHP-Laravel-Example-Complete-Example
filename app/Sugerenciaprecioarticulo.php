<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugerenciaprecioarticulo extends Model
{
    protected $table ='sugerenciaprecioarticulo';
	protected $primaryKey = 'idsugerenciaprecioarticulo'; 	
	protected $fillable = ['idarticulo', 'fechaarticulo', 'preciosugerido', 'descuentosugerido'];
	public $timestamps = false;

	public function subcategoriaservicio()
	{
		return $this->belongsTo(Articulo::class, 'idarticulo');
	}
}
