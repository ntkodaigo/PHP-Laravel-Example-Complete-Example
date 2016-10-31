<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoprofesion extends Model
{
    protected $table ='tipoprofesion';
	protected $primaryKey = 'idtipoprofesion'; 	
	protected $fillable = ['nombretipoprofesion'];
	public $timestamps = false;
}
