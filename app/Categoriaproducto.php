<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriaproducto extends Model
{
	protected $table ='categoriaproducto';
	protected $primaryKey = 'idcategoriaproducto'; 	
	protected $fillable = ['nombrecategoriaproducto'];
	public $timestamps = false;
    
}
