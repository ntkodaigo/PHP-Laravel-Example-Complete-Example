<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personatelefono extends Model
{
	protected $table ='personatelefono';
	protected $primaryKey = 'idpersonatelefono'; 	
	protected $fillable = ['idpersona','idtipotelefono','numeropersonatelefono'];
	public $timestamps = false;


    public function anexotelefonos()
	{
		return $this->hasMany(Anexotelefono::class, 'idpersonatelefono','idpersonatelefono');
	}

	public function tipotelefono()
	{
		return $this->belongsTo(Tipotelefono::class, 'idtipotelefono');
	}

	public function personas()
	{
		return $this->belongsToMany(Persona::class, 'idpersona','idpersona');
	}

	public function saveAnexoTelefono($numeroAnexTelf)
	{
		$newAnexo = new Anexotelefono;

		$last = Anexotelefono::orderBy('idanexo', 'desc')->first();
    	$newId = ($last == null) ? 1 : $last->idanexo + 1;

    	$newAnexo->idanexo = $newId;
    	$newAnexo->idpersona = $this->idpersona;
    	$newAnexo->idtipotelefono = $this->idtipotelefono;
    	$newAnexo->idpersonatelefono = $this->idpersonatelefono;
    	$newAnexo->numeroanexotelefono = $numeroAnexTelf;

		return $this->anexotelefonos()->save($newAnexo);
	}
}
