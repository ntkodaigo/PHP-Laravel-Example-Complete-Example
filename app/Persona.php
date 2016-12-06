<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table ='persona';
	protected $primaryKey = 'idpersona'; 
	protected $fillable = ['idpersona'];
	public $timestamps = false;
	public $incrementing = false;

	public function correoelectronicos()
	{
		return $this->hasMany(Correoelectronico::class, 'idpersona', 'idpersona');
	}

	public function direccionpersonas()
	{
		return $this->hasMany(Direccionpersona::class, 'idpersona', 'idpersona');
	}

	public function cliente()
	{
		return $this->hasOne(Cliente::class, 'idcliente', 'idpersona');
	}

	public function proveedor()
	{
		return $this->hasOne(Proveedor::class, 'idproveedor', 'idpersona');
	}

	public function tecnico()
	{
		return $this->hasOne(Tecnico::class, 'idtecnico', 'idpersona');
	}

	public function personanatural()
	{
		return $this-> hasOne(Personanatural::class,'idpersonanatural','idpersona');
	}	

	public function personajuridica()
	{
		return $this-> hasOne(Personajuridica::class,'idpersonajuridica','idpersona');
	}	

	public function personabytype()
    {
        return $this->morphTo('personabytype', 'persona_type', 'idpersona');
    }

	public function personatelefonos()
	{
		return $this->hasMany(Personatelefono::class, 'idpersona', 'idpersona');
	}

	public function hasTelefonos()
	{
		return count($this->personatelefonos) > 0;
	}

	public function personatelefonosWithPivot()
	{
		return $this->belongsToMany(Tipotelefono::class, 'personatelefono','idpersona', 'idtipotelefono')->withPivot(['idpersonatelefono', 'numeropersonatelefono']);
	}

	public function personaDireccionesWithPivot()
	{
		return $this->direccionpersonas()->with('pais', 'departamento', 'provincia', 'distrito')->get();
	}

	public function nacimientocreacion()
	{
		return $this-> hasOne(Nacimientocreacion::class,'idpersona','idpersona');
	}

	public function savePersonaTelefono($tt, $numeroPerTelf)
	{
		$lastEntity = Personatelefono::orderBy('idpersonatelefono', 'desc')->first();
    	$newId = ($lastEntity == null) ? 1 : $lastEntity->idpersonatelefono + 1;
    	
    	$pt = new Personatelefono;
    	$pt->idpersonatelefono = $newId;
    	$pt->idtipotelefono = $tt;
 		$pt->numeropersonatelefono = $numeroPerTelf;

		$this->personatelefonos()->save($pt);
	}

	public function updatePersonaTelefono($pt, $tt, $numeroPerTelf)
	{
		$pt = $this->personatelefonos()->find($pt);
		$pt->idtipotelefono = $tt;
		$pt->numeropersonatelefono = $numeroPerTelf;

		// save temp and delete all anexos
		$temp = $pt->anexotelefonos;
		for ($i=0; $i < count($temp); $i++) { 
			$pt->anexotelefonos[$i]->delete();
		}

		$this->personatelefonos()->save($pt);

		for ($i=0; $i < count($temp); $i++) { 
			$temp[$i]->idtipotelefono = $tt;
			$pt->anexotelefonos()->save($temp[$i]);
		}
	}

	public function saveDireccion($nomDirPer, $distrito)
	{
		$last = Direccionpersona::orderBy('iddireccionpersona', 'desc')->first();
    	$newId = ($last == null) ? 1 : $last->iddireccionpersona + 1;
    	
    	$dp = new Direccionpersona;
    	$dp->iddireccionpersona = $newId;
    	$dp->nombredireccionpersona = $nomDirPer;
    	$distrito = Distrito::find($distrito);
 		$dp->iddistrito = $distrito->iddistrito;
 		$dp->iddepartamento = $distrito->iddepartamento;
 		$dp->idprovincia = $distrito->idprovincia;
 		$dp->idpais = $distrito->idpais;

		$this->direccionpersonas()->save($dp);
	}

	public function updateDireccion($dp, $nomDirPer, $distrito)
	{
		$dp = $this->direccionpersonas()->find($dp);
		$dp->nombredireccionpersona = $nomDirPer;
		$distrito = Distrito::find($distrito);
 		$dp->iddistrito = $distrito->iddistrito;
 		$dp->iddepartamento = $distrito->iddepartamento;
 		$dp->idprovincia = $distrito->idprovincia;
 		$dp->idpais = $distrito->idpais;

		$this->direccionpersonas()->save($dp);
	}

	public function saveCorreo($dirCorrElec)
	{
		$last = Correoelectronico::orderBy('idcorreoelectronico', 'desc')->first();
    	$newId = ($last == null) ? 1 : $last->idcorreoelectronico + 1;
    	
    	$ce = new Correoelectronico;
    	$ce->idcorreoelectronico = $newId;
    	$ce->direccioncorreoelectronico = $dirCorrElec;

		$this->correoelectronicos()->save($ce);
	}

	public function updateCorreo($ce, $dirCorrElec)
	{
		$ce = $this->correoelectronicos()->find($ce);
		$ce->direccioncorreoelectronico = $dirCorrElec;

		$this->correoelectronicos()->save($ce);
	}
}
