<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoriaproducto extends Model
{
    protected $table ='subcategoriaproducto';
	protected $primaryKey = 'idsubcategoriaproducto'; 	
	protected $fillable = ['idcategoriaproducto', 'nombresubcategoriaproducto'];
	public $timestamps = false;

	public function categoriaproducto()
	{
		return $this->belongsTo(Categoriaproducto::class, 'idcategoriaproducto');
	}

	public function producto()
	{
		return $this->hasOne(Producto::class,'idsubcategoriaproducto','idsubcategoriaproducto');
	}
}
