<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impuestofecha extends Model
{
    protected $table ='impuestofecha';
	protected $primaryKey = 'idimpuestofecha'; 	
	protected $fillable = ['idtipoimpuesto', 'porcentajeimpuesto', 'fechaimpuesto'];
	public $timestamps = false;

	public function tipoimpuesto()
	{
		return $this->belongsTo(Tipoimpuesto::class, 'idtipoimpuesto');
	}

	public function personajuridicas()
	{
		return $this->belongsToMany(Personajuridica::class, 'personajuridicaimpuestofecha', 'idimpuestofecha','idpersonajuridica');
	}
}
