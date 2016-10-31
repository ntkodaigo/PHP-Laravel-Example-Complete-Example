<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipotelefono extends Model
{
    protected $table ='tipotelefono';
	protected $primaryKey = 'idtipotelefono'; 	
	protected $fillable = ['nombretipotelefono'];
	public $timestamps = false;
}
