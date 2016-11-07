<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexotelefono extends Model
{
    protected $table ='anexotelefono';
	protected $primaryKey = 'idanexo'; 	
	protected $fillable = ['idpersona','idtipotelefono' ,'idpersonatelefono','numeroanexotelefono'];
	public $timestamps = false;

	public function personatelefono()
	{
		return $this->belongsTo(Personatelefono::class, 'idpersonatelefono','idpersonatelefono');
	}
}
