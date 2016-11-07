<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoimpuesto extends Model
{
	protected $table ='tipoimpuesto';
	protected $primaryKey = 'idtipoimpuesto'; 	
	protected $fillable = ['nombretipoimpuesto'];
	public $timestamps = false;

 	public function impuestofechas()
    {
    	return $this->hasMany(Impuestofecha::class, 'idtipoimpuesto', 'idtipoimpuesto');
    }
}
