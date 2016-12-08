<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table ='almacen';
	protected $primaryKey = 'idcompra'; 	
	protected $fillable = ['idproveedor', 'idcategoriaproducto', 'idsubcategoriaproducto', 'idproducto', 'fechaalmacen', 'ubicacion', 'lote'];
	public $timestamps = false;
	public $incrementing = false;

	public function compra()
	{
		return $this->hasOne(Compra::class, 'idcompra', 'idcompra');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idproducto');
	}
}