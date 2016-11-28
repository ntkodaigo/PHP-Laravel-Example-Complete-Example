<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Marca;
use App\Cliente;
use App\Genero;
use App\Persona;
use App\Personanatural;
use App\Nacimientocreacion;
use App\Tipodocumento;
use App\Tipotelefono;
use App\Personatelefono;

class ClientesController extends Controller
{
	/*public $personanaturalTemp;

	public function __construct()
    {
    	$this->personanaturalTemp = new Personanatural;
    }*/

    public function index()
    {
        $marcas = Marca::all();
    	return view('marcas.search', compact('marcas'));
    }
  
    public function documentosData(Personanatural $personanatural)
    {
        return Datatables::of($personanatural->tipodocumentos)->addColumn('action', function ($doc) {
            
            return '<button type="button" onclick="btnUpdateDocumento('.$doc->idtipodocumento.', \''.$doc->pivot->numerodocumento.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#documento-modal"><i class="glyphicon glyphicon-edit"></i>Editar</button>

                <button type="button" onclick="btnDeleteDocumento('.$doc->idtipodocumento.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
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

    /*public function documentosDataTemp()
    {
    	$tipodocumentosTemp = array(
			'idpersonanatural' => '1',
			'idtipodocumento' => '1',
			'numerodocumento' => '12121',
		);

        return Datatables::of($tipodocumentosTemp)->addColumn('action', function ($pjTd) {
            
            return '<button onclick="botoneditar('.$pjTd->idpersonanatural.')" class="btn btn-success btn-edit" id="btneditar"><i class="glyphicon glyphicon-edit"></i>Edit</button>

                <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-bin"></i>Delete</a>';
                
            })->make(true);
    }*/

    public function documentoAtIndex(Request $request)
    {
    	//eturn response()->json(['response' => $index]);
    	return response()->json(['success' => true, 'data' => $request->id]);
    }

    public function fillNewPN()
    {
    	$init_route = config('constants.init_route');
    	// CRUD?
    	$key = 'c';
    	$title = 'Registro de';
    	$entityName = Cliente::$entityName;
    	$clienteTypeName = Personanatural::$entityName;
    	$generos = Genero::all();

    	return view('clientes.crud', compact('title', 'entityName', 'clienteTypeName', 'key', 'generos','init_route'));
    }

    public function showPN(Personanatural $personanatural)
    {
    	$init_route = config('constants.init_route');
    	$title = 'Datos de';
    	// CRUD?
    	$key = 's';
    	$entityName = Cliente::$entityName;
    	$clienteTypeName = Personanatural::$entityName;
    	$generos = Genero::all();
        $tipodocumentos = Tipodocumento::all();
        $tipotelefonos = Tipotelefono::all();

    	return view('clientes.crud', compact('title','clienteTypeName','entityName', 'key', 'generos','init_route', 'personanatural', 'tipodocumentos', 'tipotelefonos'));
    }

    public function storePN(Request $request)
    {
    	//return response()->json(['success' => true, 'data' => $request]);

    	$lastPersona = Persona::orderBy('idpersona', 'desc')->first();
    	$newId = ($lastPersona == null) ? 1 : $lastPersona->idpersona + 1;
    	$newId = str_pad($newId, 8, "0", STR_PAD_LEFT);

    	$newPersona = new Persona;
    	$newPersona->idpersona = $newId;
    	$newPersona->save();

    	$newCliente = new Cliente;
    	$newPersona->cliente()->save($newCliente);

    	$newPerNatural = new Personanatural;
    	$newPerNatural->nombres = $request->nombres;
    	$newPerNatural->apellido_paterno = $request->apellido_paterno;
    	$newPerNatural->apellido_materno = $request->apellido_materno;
    	$newPersona->personanatural()->save($newPerNatural);

    	$fechaNacCrea = new Nacimientocreacion;
    	$fechaNacCrea->fechanacimientocreacion = $request->fechanacimientocreacion;
		$newPersona->nacimientocreacion()->save($fechaNacCrea);

		$genero = Genero::find($request->idgenero);
		$newPerNatural = Personanatural::find($newId);
		$newPerNatural->generos()->save($genero);

        return redirect('clientes/show/pn/'.$newPerNatural->idpersonanatural);

		//return redirect()->route('clientes/show/pn', ['personanatural' => $newPerNatural->idpersonanatural]);
        //return response()->json(['success' => true, 'data' => $newCliente]);
    }

    public function updatePN(Request $request, Personanatural $personanatural)
    {
    	$personanatural -> update($request->all());

        return response()->json(['success' => true]);
    }

    public function delete(Marca $marca)
    {
        $marca->delete();
        return back();
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
        $personanatural->deleteDocumento($request->idtipodocumento);

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
        $personatelefono->delete();

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
}




