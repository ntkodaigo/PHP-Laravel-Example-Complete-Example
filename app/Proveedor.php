<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
	public static $entityName = 'Proveedor';

    protected $table ='proveedor';
	protected $primaryKey = 'idproveedor'; 	
	protected $fillable = ['idproveedor'];
	public $timestamps = false;
	public $incrementing = false;

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'proveedorproducto', 'idproveedor');
	}

	public function persona()
	{
		return $this->hasOne(Persona::class, 'idpersona', 'idproveedor');
	}
}
