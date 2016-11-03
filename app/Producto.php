<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ='producto';
	protected $primaryKey = 'idproducto'; 	
	protected $fillable = ['idcategoriaproducto', 'idsubcategoriaproducto','codigoproducto','nombreproducto','marcaproducto','modeloproducto','descripcionproducto'];
	public $timestamps = false;

	public function subcategoriaproducto()
	{
		return $this->belongsTo(Subcategoriaproducto::class, 'idsubcategoriaproducto');
	}

	public function articulo()
	{
		return $this->hasOne(Articulo::class, 'idarticulo','idproducto');
	}

	public function provedores()
	{
		return $this->belongsToMany(Proveedor::class, 'proveedorproducto', 'idproducto');
	}

}
