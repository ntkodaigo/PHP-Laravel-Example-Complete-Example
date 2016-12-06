<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Persona;
use App\Personatelefono;
use App\Anexotelefono;
use App\Direccionpersona;
use App\Correoelectronico;

class PersonasController extends Controller
{
	public function personasMorphData()
	{
		return Datatables::of(Persona::with('personabytype')->get())->addColumn('action', function ($entity) {
            
            return '<button data-toggle="modal" data-target="#roles-modal" type="button" onclick="btnAllRoles(\''.$entity->idpersona.'\', \''.$entity->persona_type.'\')" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Roles</button>';
               
        	})->make(true);
	}

	public function telefonosData(Persona $persona)
    {
        return Datatables::of($persona->personatelefonosWithPivot)/*->addColumn('nombretipotelefono', function($entity) {
                return ucfirst(Tipotelefono::find($entity->idtipotelefono)->nombretipotelefono);
            })*/->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateTelefono('.$entity->pivot->idpersonatelefono.','.$entity->idtipotelefono.', \''.$entity->pivot->numeropersonatelefono.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#telefono-modal"><i class="glyphicon glyphicon-edit"></i>Ver/Editar</button>

                <button type="button" onclick="btnDeleteTelefono('.$entity->pivot->idpersonatelefono.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

    public function anexosData(Personatelefono $personatelefono)
    {
        return Datatables::of($personatelefono->anexotelefonos)/*->addColumn('nombretipotelefono', function($entity) {
                return ucfirst(Tipotelefono::find($entity->idtipotelefono)->nombretipotelefono);
            })*/->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateAnexo('.$entity->idanexo.',\''.$entity->numeroanexotelefono.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#anexo-modal"><i class="glyphicon glyphicon-edit"></i>Ver/Editar</button>

                <button type="button" onclick="btnDeleteAnexo('.$entity->idanexo.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

    public function direccionesData(Persona $persona)
    {
        return Datatables::of($persona->personaDireccionesWithPivot())/*->addColumn('nombretipotelefono', function($entity) {
                return ucfirst(Tipotelefono::find($entity->idtipotelefono)->nombretipotelefono);
            })*/->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateDireccion('.$entity->iddireccionpersona.',\''.$entity->nombredireccionpersona.'\','.$entity->idpais.','.$entity->iddepartamento.','.$entity->idprovincia.','.$entity->iddistrito.')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#direccion-modal"><i class="glyphicon glyphicon-edit"></i>Ver/Editar</button>

                <button type="button" onclick="btnDeleteDireccion('.$entity->iddireccionpersona.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

    public function correosData(Persona $persona)
    {
        return Datatables::of($persona->correoelectronicos)/*->addColumn('nombretipotelefono', function($entity) {
                return ucfirst(Tipotelefono::find($entity->idtipotelefono)->nombretipotelefono);
            })*/->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateCorreo('.$entity->idcorreoelectronico.',\''.$entity->direccioncorreoelectronico.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#correo-modal"><i class="glyphicon glyphicon-edit"></i>Ver/Editar</button>

                <button type="button" onclick="btnDeleteCorreo('.$entity->idcorreoelectronico.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

	public function index()
	{
		return view('personas.index');
	}

    public function searchRoles(Request $request, Persona $persona)
    {
        $rollayer = 0;
        $rollayer += ($persona->cliente != null ? 1 : 0);
        $rollayer += ($persona->proveedor != null ? 2 : 0);
        if ($persona->personanatural != null)
            $rollayer += ($persona->personanatural->tecnico != null ? 4 : 0);

        return response()->json(['success' => true, 'rollayer' => $rollayer]);
    }

    public function updateNC(Request $request, Persona $persona)
    {
        $persona->nacimientocreacion() -> update($request->all());

        return response()->json(['success' => true]);
    }

    public function storeTelefono(Request $request, Persona $persona)
    {
        $persona->savePersonaTelefono($request->idtipotelefono, $request->numeropersonatelefono);

        return response()->json(['success' => true]);
    }

    public function updateTelefono(Request $request, Persona $persona)
    {
        $persona->updatePersonaTelefono($request->idpersonatelefono, $request->idtipotelefono, $request->numeropersonatelefono);

        return response()->json(['success' => true]);
    }

    public function deleteTelefono(Request $request, Personatelefono $personatelefono)
    {
        $personatelefono->deleteWithAnexos();

        return response()->json(['success' => true]);
    }

    public function storeAnexoTelefono(Request $request, Personatelefono $personatelefono)
    {
        $personatelefono->saveAnexoTelefono($request->numeroanexotelefono);

        return response()->json(['success' => true]);
    }

    public function updateAnexoTelefono(Request $request, Personatelefono $personatelefono)
    {
        $personatelefono->updateAnexoTelefono($request->idanexo, $request->numeroanexotelefono);

        return response()->json(['success' => true]);
    }

    public function deleteAnexoTelefono(Request $request, Anexotelefono $anexotelefono)
    {
        $anexotelefono->delete();

        return response()->json(['success' => true]);
    }

    public function storeDireccion(Request $request, Persona $persona)
    {
        $persona->saveDireccion($request->nombredireccionpersona, $request->iddistrito);

        return response()->json(['success' => true]);
    }

    public function updateDireccion(Request $request, Persona $persona)
    {
        $persona->updateDireccion($request->iddireccionpersona, $request->nombredireccionpersona, $request->iddistrito);

        return response()->json(['success' => true]);
    }

    public function deleteDireccion(Request $request, Direccionpersona $direccionpersona)
    {
        $direccionpersona->delete();

        return response()->json(['success' => true]);
    }

    public function storeCorreo(Request $request, Persona $persona)
    {
        $persona->saveCorreo($request->direccioncorreoelectronico);

        return response()->json(['success' => true]);
    }

    public function updateCorreo(Request $request, Persona $persona)
    {
        $persona->updateCorreo($request->idcorreoelectronico, $request->direccioncorreoelectronico);

        return response()->json(['success' => true]);
    }

    public function deleteCorreo(Request $request, Correoelectronico $correoelectronico)
    {
        $correoelectronico->delete();

        return response()->json(['success' => true]);
    }
}
