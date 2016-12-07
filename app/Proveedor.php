<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table ='proveedor';
	protected $primaryKey = 'idproveedor'; 	
	protected $fillable = ['idproveedor'];
	public $timestamps = false;
	public $incrementing = false;

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'proveedorproducto', 'idproveedor', 'idproducto')->withPivot('idcategoriaproducto', 'idsubcategoriaproducto');
	}

	public function persona()
	{
		return $this->hasOne(Persona::class, 'idpersona', 'idproveedor');
	}

	public function exitsProducto($v)
	{
		return $this->productos->contains($v);
	}

	public function saveProducto($v)
	{
		$v = Producto::find($v);
		$this->productos()->attach($v, array('idcategoriaproducto' => $v->idcategoriaproducto, 'idsubcategoriaproducto' => $v->idsubcategoriaproducto));
	}
}
