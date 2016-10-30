<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoimpuesto extends Model
{
	protected $table ='tipoimpuesto';
	protected $primaryKey = 'idtipoimpuesto'; 	
	protected $fillable = ['nombretipoimpuesto'];
	public $timestamps = false;
 	/*  public function members()
    {
    	return $this->hasMany(Member::class);
    }*/
}
