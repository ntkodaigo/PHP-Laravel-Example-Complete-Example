<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Cliente;
use App\Revision;
use App\Vehiculo;
use App\Servicio;

class RevisionesController extends Controller
{
    public function cliVehRevisionesData($idvehiculo, Cliente $cliente)
    {
    	return Datatables::of($cliente->revisionsOfVehiculo($idvehiculo)->with('tecnico.personanatural', 'servicio')->get())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateRevision(\''.$entity->idrevision.'\',\''.$entity->idtecnico.'\','.$entity->idservicio.','.$entity->kilometrajerevision.',\''.$entity->estadorevision.'\','.$entity->tiemporeparacion.',\''.explode(' ',$entity->fecharevision)[0].'\',\''.explode(' ',$entity->fecharevisionposterior)[0].'\',\''.$entity->periodorevision.'\',\''.$entity->tecnico->personanatural->nombres.' '.$entity->tecnico->personanatural->apellido_paterno.' '.$entity->tecnico->personanatural->apellido_materno.'\',\''.$entity->servicio->nombreservicio.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#revision-modal"><i class="glyphicon glyphicon-edit"></i>Detalles</button>

                <button type="button" onclick="btnDeleteRevision(\''.$entity->idrevision.'\')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

    public function storeForClienteVehiculo(Request $request, Cliente $cliente, Vehiculo $vehiculo)
    {
    	$last = Revision::orderBy('idrevision', 'desc')->first();
    	$newId = ($last == null) ? 1 : $last->idrevision + 1;
        $newId = str_pad($newId, 10, "0", STR_PAD_LEFT);

        $r = new Revision($request->all());
        $r->idrevision = $newId;
        $r->idvehiculo = $vehiculo->idvehiculo;;
        $s = Servicio::find($r->idservicio);
        $r->idcategoriaservicio = $s->idcategoriaservicio;
        $r->idsubcategoriaservicio = $s->idsubcategoriaservicio;
        $r->idmarca = $vehiculo->idmarca;
        $r->idmodelo = $vehiculo->idmodelo;

        $cliente->revisions()->save($r);

        return response()->json(['success' => true]);
    }

    public function updateForClienteVehiculo(Request $request, Cliente $cliente)
    {
    	$rtemp = new Revision($request->all());
    	$r = $cliente->revisions()->find($request->idrevision);
    	if ($rtemp->idservicio != $r->idservicio)
    	{
    		$s = Servicio::find($rtemp->idservicio);
    		$rtemp->idcategoriaservicio = $s->idcategoriaservicio;
        	$rtemp->idsubcategoriaservicio = $s->idsubcategoriaservicio;
    	}

    	$r->update($rtemp->toArray());

        return response()->json(['success' => true]);
    }

    public function delete(Request $request, Revision $revision)
    {
    	$revision->delete();

    	return response()->json(['success' => true]);
    }
}
