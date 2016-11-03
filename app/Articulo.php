<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table ='articulo';
	protected $primaryKey = 'idarticulo';
	public $timestamps = false;

	public function sugerenciaprecioarticulos()
	{
		return $this->hasMany(Sugerenciaprecioarticulo::class, 'idarticulo', 'idarticulo');
	}

	public function factura()
	{
		return $this->belongsTo(Factura::class, 'idarticulo');
	}

	public function servicio()
	{
		return $this->hasOne(Servicio::class, 'idservicio', 'idarticulo');
	}

	public function producto()
	{
		return $this->hasOne(Producto::class, 'idproducto','idarticulo');
	}

}
