<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table ='proveedorproducto';
	protected $primaryKey = 'idproveedor'; 	
	protected $fillable = ['idproveedor'];
	public $timestamps = false;
	public $incrementing = false;

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'proveedorproducto', 'idproveedor');
	}
}
