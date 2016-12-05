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
	/*public $tipodocumentosTemp = array(
			'idpersonanatural' => '1',
			'idtipodocumento' => '1',
			'numerodocumento' => '12121',
		);*/

	public function persona()
	{
		return $this-> hasOne(Persona::class,'idpersona','idpersonanatural');
	}	

	public function mypersona()
	{
		return $this->morphOne(Persona::class, 'personabytype', 'persona_type', 'idpersona', 'idpersonanatural');
	}

   	public function tipoprofesiones()
	{
		return $this -> belongsToMany(Tipoprofesion::class,'personanaturaltipoprofesion','idpersonanatural','idtipoprofesion');
	}

	public function tecnico()
	{
		return $this-> hasOne(Tecnico::class,'idtecnico','idpersonanatural');
	}

	public function generos()
	{
		return $this-> belongsToMany(Genero::class,'personanaturalgenero','idpersonanatural','idgenero');
	}

	public function updateGenero($idgenero)
	{
		$this->generos()->sync(array('idgenero' => $idgenero));
	}

	public function tipodocumentos()
	{
		return $this->belongsToMany(Tipodocumento::class,'personanaturaltipodocumento','idpersonanatural','idtipodocumento')->withPivot('numerodocumento');
	}

	public function exitsTipodocumento($td)
	{
		return $this->tipodocumentos->contains($td);
	}

	// params: $td waits for a Tipodocumento object or the id
	public function saveTipoDocumento($td, $numeroDoc)
	{
		$this->tipodocumentos()->attach($td, array('numerodocumento' => $numeroDoc));
	}

	public function updateTipoDocumento($td, $numeroDoc)
	{
		$this->tipodocumentos()->updateExistingPivot($td, array('numerodocumento' => $numeroDoc));
	}

	public function deleteTipoDocumento($td)
	{
		$this->tipodocumentos()->detach($td);
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

	public function exitsProfesion($tp)
	{
		return $this->tipoprofesiones->contains($tp);
	}

	// params: $tp waits for a Tipodocumento object or the id
	public function saveProfesion($tp)
	{
		$this->tipoprofesiones()->attach($tp);
	}

	public function updateProfesion($tp)
	{
		$this->tipoprofesiones()->updateExistingPivot($tp, array('idtipoprofesion' => $tp));
	}

	public function deleteProfesion($tp)
	{
		$this->tipoprofesiones()->detach($tp);
	}
}
