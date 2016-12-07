<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Personanatural;

class PersonanaturalController extends Controller
{
	public function documentosData(Personanatural $personanatural)
    {
        return Datatables::of($personanatural->tipodocumentos)->addColumn('action', function ($doc) {
            
            return '<button type="button" onclick="btnUpdateDocumento('.$doc->idtipodocumento.', \''.$doc->pivot->numerodocumento.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#documento-modal"><i class="glyphicon glyphicon-edit"></i>Editar</button>

                <button type="button" onclick="btnDeleteDocumento('.$doc->idtipodocumento.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

	public function profesionesData(Personanatural $personanatural)
    {
        return Datatables::of($personanatural->tipoprofesiones)->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateProfesion('.$entity->idtipoprofesion.')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#profesion-modal"><i class="glyphicon glyphicon-edit"></i>Editar</button>

                <button type="button" onclick="btnDeleteProfesion('.$entity->idtipoprofesion.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

    public function update(Request $request, Personanatural $personanatural)
    {
    	$personanatural -> update($request->all());

        return response()->json(['success' => true]);
    }

    public function updateGenero(Request $request, Personanatural $personanatural)
    {
    	$personanatural->updateGenero($request->idgenero);

    	return response()->json(['success' => true]);
    }

    public function storeDocumento(Request $request, Personanatural $personanatural)
    {
        if (!$personanatural->exitsTipodocumento($request->idtipodocumento))
        {
            $personanatural->saveTipoDocumento($request->idtipodocumento, $request->numerodocumento);

            return response()->json(['success' => true]);
        }
        else
            return response()->json(['success' => false]);
    }

    public function updateDocumento(Request $request, Personanatural $personanatural)
    {
        $personanatural->updateTipoDocumento($request->idtipodocumento, $request->numerodocumento);

        return response()->json(['success' => true]);
    }

    public function deleteDocumento(Request $request, Personanatural $personanatural)
    {
        $personanatural->deleteTipoDocumento($request->idtipodocumento);

        return response()->json(['success' => true]);
    }

    public function storeProfesion(Request $request, Personanatural $personanatural)
    {
        if (!$personanatural->exitsProfesion($request->idtipoprofesion))
        {
            $personanatural->saveProfesion($request->idtipoprofesion);

            return response()->json(['success' => true]);
        }
        else
            return response()->json(['success' => false]);
    }

    public function updateProfesion(Request $request, Personanatural $personanatural)
    {
        $personanatural->updateProfesion($request->idtipoprofesion);

        return response()->json(['success' => true]);
    }

    public function deleteProfesion(Request $request, Personanatural $personanatural)
    {
        $personanatural->deleteProfesion($request->idtipoprofesion);

        return response()->json(['success' => true]);
    }
}
