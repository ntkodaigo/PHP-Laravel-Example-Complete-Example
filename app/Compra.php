<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table ='compra';
	protected $primaryKey = 'idcompra'; 	
	protected $fillable = ['idproveedor', 'idcategoriaproducto', 'idsubcategoriaproducto', 'idproducto', 'fechacompra', 'cantidadcompra', 'preciocompra'];
	public $timestamps = false;
	public $incrementing = false;

	public function productos()
	{
		return $this->hasMany(Producto::class, 'idproducto', 'idproducto');
	}

	public function proveedores()
	{
		return $this->hasMany(Proveedor::class, 'idproveedor', 'idproveedor');
	}

	public function almacen()
	{
		return $this->hasOne(Almacen::class, 'idcompra', 'idcompra');
	}
}
