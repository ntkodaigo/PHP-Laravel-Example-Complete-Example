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
  
    public function documentosData($pnId)
    {
    	$pn = Personanatural::find($pnId);

        return Datatables::of($pn->tipodocumentos)->addColumn('action', function ($doc) {
            
            return '<button onclick="" class="btn btn-success btn-edit" data-toggle="modal" data-target="#marca" id="btneditar"><i class="glyphicon glyphicon-edit"></i>Edit</button>

                <a href="docs/'.$doc->pivot->idtipodocumento.'/delete" class="btn btn-danger" data-id=""><i class="glyphicon glyphicon-bin"></i>Delete</a>';
                
            })->make(true);
    }

    public function documentosDataTemp()
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
    }

    public function documentoAtIndex(Request $request)
    {
    	//eturn response()->json(['response' => $index]);
    	return response()->json(['success' => true, 'data' => $request->id]);
    }

    public function fillNew()
    {
    	$init_route = config('constants.init_route');
    	// CRUD?
    	$key = 'c';
    	$entityName = Cliente::$entityName;
    	$generos = Genero::all();

    	return view('clientes.crud', compact('entityName', 'key', 'generos','init_route'));
    }

    public function store(Request $request)
    {
    	//return response()->json(['success' => true, 'data' => $request]);

    	$lastPersona = Persona::orderBy('idpersona', 'desc')->first();
    	$newId = ($lastPersona == null) ? 1 : $lastPersona->idpersona + 1;

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

		$init_route = config('constants.init_route');
    	// CRUD?
    	$key = 's';
    	$entityName = Cliente::$entityName;
    	$generos = Genero::all();

    	return view('clientes.crud', compact('entityName', 'key', 'generos','init_route'));
        //return response()->json(['success' => true, 'data' => $newCliente]);
    }

    public function update(Request $request, Marca $marca)
    {
    	$marca -> update($request->all());
        return back();
    }

    public function delete( Marca $marca)
    {
        $marca->delete();
        return back();
    }
}




