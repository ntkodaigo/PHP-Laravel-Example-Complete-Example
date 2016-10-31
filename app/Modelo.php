<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table ='modelo';
	protected $primaryKey = 'idmodelo'; 	
	protected $fillable = ['idmarca', 'nombremodelo'];
	public $timestamps = false;

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'idmarca');
	}
}
