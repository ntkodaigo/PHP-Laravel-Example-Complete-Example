<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedorproducto extends Model
{
    protected $table ='proveedorproducto';
	protected $primaryKey = 'idproveedor'; 	
	protected $fillable = ['idproveedor', 'idcategoriaproducto', 'idsubcategoriaproducto','idproducto'];
	public $timestamps = false;

	public function categoriaproducto()
	{
		return $this->belongsTo(Categoriaproducto::class, 'idcategoriaproducto');
	}

	public function subcategoriaproducto()
	{
		return $this->belongsTo(Subcategoriaproducto::class, 'idsubcategoriaproducto');
	}

	public function Producto()
	{
		return $this->hasOne(Articulo::class, 'idproducto','idproveedor');
	}

	public function proveedor()
	{
		return $this->belongsToMany(Proveedor::class, 'proveedor', 'idproveedor');
	}
}
