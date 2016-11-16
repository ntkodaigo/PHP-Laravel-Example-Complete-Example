<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personanatural extends Model
{
	public static $entityName = "Persona Natural";

   	protected $table ='personanatural';
	protected $primaryKey = 'idpersonanatural'; 	
	protected $fillable = ['nombres','apellido_paterno','apellido_materno'];
	public $incrementing = false;
	public $timestamps = false;

	//Temps
	public $tipodocumentosTemp = array(
			'idpersonanatural' => '1',
			'idtipodocumento' => '1',
			'numerodocumento' => '12121',
		);

	public function persona()
	{
		return $this-> hasOne(Persona::class,'idpersona','idpersonanatural');
	}	


   	public function tipoprofesions()
	{
		return $this -> belongsToMany(Personanatural::class,'personanaturaltipoprofesion','idpersonatural','idtipoprofesion');

	}

	public function tecnico()
	{
		return $this-> hasOne(Tecnico::class,'idtecnico','idpersonanatural');
	}

	public function generos()
	{
		return $this-> belongsToMany(Genero::class,'personanaturalgenero','idpersonanatural','idgenero');
	}

	public function tipodocumentos()
	{
		return $this->belongsToMany(Tipodocumento::class,'personanaturaltipodocumento','idpersonanatural','idtipodocumento')->withPivot('numerodocumento');
	}

	public function saveTipoDocumento($td, $numeroDoc)
	{
		$this->tipodocumentos()->attach($td, array('numerodocumento' => $numeroDoc));
	}

	public function addTipoDocumentoTemp($td, $numeroDoc)
	{
		$pnTd = new Personanaturaltipodocumento;
		$pnTd->idpersonanatural = count($this->tipodocumentosTemp) + 1;
		$pnTd->idtipodocumento = $td->idtipodocumento;
		$pnTd->numerodocumento = $numeroDoc;
		$this->tipodocumentosTemp[] = $pnTd;

		foreach ($this->tipodocumentosTemp as $key => $value) 
		{
			echo "{$key} => {$value}";
		}
	}

	public function saveTipoDocumentosTemp()
	{
		foreach ($this->tipodocumentosTemp as $value) 
		{
			$td = Tipodocumento::find($value->idtipodocumento);

			$this->tipodocumentos()->save($td, array('numerodocumento' => $value->numerodocumento));
		}
	}
}
