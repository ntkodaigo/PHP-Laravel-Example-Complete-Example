<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $table ='revision';
	protected $primaryKey = 'idrevision'; 	
	protected $fillable = ['idtecnico','idcliente','idvehiculo','idcategoriaservicio','idsubcategoriaservicio','idservicio','kilometrajerevision','estadorevision','tiemporeparacion','fechareparacion','fecharevision','fecharevisionposterior','idmarca','idmodelo', 'periodorevision'];
	public $incrementing = false;
	public $timestamps = false;


	public function nacimientocreacion()
	{
		return $this-> hasOne(Nacimientocreacion::class,'idpersona','idpersona');
	}	


	public function cliente()
	{
		return $this-> belongsTo(Cliente::class,'idcliente');
	}	

	public function vehiculo()
	{
		return $this-> belongsTo(Vehiculo::class,'idvehiculo');
	}	

	public function servicio()
	{
		return $this-> belongsTo(Servicio::class,'idservicio');
	}	

	public function tecnico()
	{
		return $this->belongsTo(Tecnico::class, 'idtecnico');
	}
}
