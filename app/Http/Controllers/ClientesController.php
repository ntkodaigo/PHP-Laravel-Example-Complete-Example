<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Cliente;
use App\Genero;
use App\Persona;
use App\Personanatural;
use App\Personajuridica;
use App\Nacimientocreacion;
use App\Tipodocumento;
use App\Tipotelefono;
use App\Pais;
use App\Tipoprofesion;
use App\Marca;
use App\Factura;

class ClientesController extends Controller
{
	/*public $personanaturalTemp;

	public function __construct()
    {
    	$this->personanaturalTemp = new Personanatural;
    }*/

    /*public function index()
    {
        $marcas = Marca::all();
    	return view('marcas.search', compact('marcas'));
    }*/

    public function clientesMorphData()
    {
        return Datatables::of(Cliente::with('persona.personabytype')->get())->addColumn('action', function ($entity) {
            
            return '<button data-toggle="modal" data-target="#roles-modal" type="button" onclick="btnAllRoles(\''.$entity->idpersona.'\', \''.$entity->persona_type.'\')" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Roles</button>';
               
            })->make(true);
    }




    public function vehiculosData(Cliente $cliente)
    {
        return Datatables::of($cliente->vehiculosWithPivot())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateVehiculo(\''.$entity->idvehiculo.'\','.$entity->idmarca.','.$entity->idmodelo.',\''.$entity->aniovehiculo.'\',\''.$entity->numeroplacavehivulo.'\',\''.$entity->descripcion.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#vehiculo-modal"><i class="glyphicon glyphicon-edit"></i>Ver / Editar</button>

                <button type="button" onclick="btnRevisionesVehiculo(\''.$entity->idvehiculo.'\',\''.$entity->numeroplacavehivulo.'\')" class="btn btn-edit" data-toggle="modal" data-target="#clivehrevision-modal"><i class="glyphicon glyphicon-trash"></i>Revisiones</button>

                <button type="button" onclick="btnDeleteClienteVehiculo(\''.$entity->idvehiculo.'\')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
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

    /*public function documentoAtIndex(Request $request)
    {
    	//eturn response()->json(['response' => $index]);
    	return response()->json(['success' => true, 'data' => $request->id]);
    }*/

    public function fillNewPN()
    {
    	$init_route = config('constants.init_route');
    	// CRUD?
    	$key = 'c';
    	$title = 'Registro de';
    	$entityName = Cliente::$entityName;
    	$personaTypeName = Personanatural::$entityName;
    	$generos = Genero::all();

    	return view('personas.crud', compact('title', 'entityName', 'personaTypeName', 'key', 'generos','init_route'));
    }

    public function showPN(Personanatural $personanatural)
    {
    	$init_route = config('constants.init_route');
    	$title = 'Datos de';
    	// CRUD?
    	$key = 's';
    	$entityName = Cliente::$entityName;
    	$personaTypeName = Personanatural::$entityName;
    	$generos = Genero::all();
        $tipodocumentos = Tipodocumento::all();
        $tipotelefonos = Tipotelefono::all();
        $tipoProfesiones = Tipoprofesion::all();
        $paises = Pais::all();
        $marcas = Marca::all();

    	return view('personas.crud', compact('title','personaTypeName','entityName', 'key', 'generos','init_route', 'personanatural', 'tipodocumentos', 'tipotelefonos', 'tipoProfesiones', 'paises', 'marcas'));
    }

    public function storePN(Request $request)
    {
    	//return response()->json(['success' => true, 'data' => $request]);

    	$last = Persona::orderBy('idpersona', 'desc')->first();
    	$newId = ($last == null) ? 1 : $last->idpersona + 1;
    	$newId = str_pad($newId, 8, "0", STR_PAD_LEFT);

    	$newPersona = new Persona;
    	///$newPersona->idpersona = $newId;

    	$newPerNatural = new Personanatural;
        $newPerNatural->idpersonanatural = $newId;
    	$newPerNatural->nombres = $request->nombres;
    	$newPerNatural->apellido_paterno = $request->apellido_paterno;
    	$newPerNatural->apellido_materno = $request->apellido_materno;

        $newPerNatural->mypersona()->save($newPersona);

        $newPersona->personanatural()->save($newPerNatural);

        $newCliente = new Cliente;
        $newPersona->cliente()->save($newCliente);

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

    public function storeFromPN(Personanatural $personanatural)
    {
        $cliente =  new Cliente;
        $personanatural->persona->cliente()->save($cliente);

        return redirect('clientes/show/pn/'.$personanatural->idpersonanatural);
    }

    public function fillNewPJ()
    {
        $init_route = config('constants.init_route');
        // CRUD?
        $key = 'c';
        $title = 'Registro de';
        $entityName = Cliente::$entityName;
        $personaTypeName = Personajuridica::$entityName;

        return view('personas.crud', compact('title', 'entityName', 'personaTypeName', 'key', 'init_route'));
    }

    public function showPJ(Personajuridica $personajuridica)
    {
        $init_route = config('constants.init_route');
        $title = 'Datos de';
        // CRUD?
        $key = 's';
        $entityName = Cliente::$entityName;
        $personaTypeName = Personajuridica::$entityName;
        $tipodocumentos = Tipodocumento::all();
        $tipotelefonos = Tipotelefono::all();
        $tipoProfesiones = Tipoprofesion::all();
        $paises = Pais::all();
        $marcas = Marca::all();

        return view('personas.crud', compact('title','personaTypeName','entityName', 'key', 'init_route', 'personajuridica', 'tipodocumentos', 'tipotelefonos', 'tipoProfesiones', 'paises', 'marcas'));
    }

    public function storePJ(Request $request)
    {
        $lastPersona = Persona::orderBy('idpersona', 'desc')->first();
        $newId = ($lastPersona == null) ? 1 : $lastPersona->idpersona + 1;
        $newId = str_pad($newId, 8, "0", STR_PAD_LEFT);

        $newPersona = new Persona;
        ///$newPersona->idpersona = $newId;

        $newPerJuridica = new Personajuridica;
        $newPerJuridica->idpersonajuridica = $newId;
        $newPerJuridica->razonsocial = $request->razonsocial;
        $newPerJuridica->ruc = $request->ruc;

        $newPerJuridica->mypersona()->save($newPersona);

        $newPersona->personajuridica()->save($newPerJuridica);

        $newCliente = new Cliente;
        $newPersona->cliente()->save($newCliente);

        $fechaNacCrea = new Nacimientocreacion;
        $fechaNacCrea->fechanacimientocreacion = $request->fechanacimientocreacion;
        $newPersona->nacimientocreacion()->save($fechaNacCrea);

        return redirect('clientes/show/pj/'.$newPerJuridica->idpersonajuridica);
    }

    public function storeFromPJ(Personajuridica $personajuridica)
    {
        $cliente =  new Cliente;
        $personajuridica->persona->cliente()->save($cliente);

        return redirect('clientes/show/pj/'.$personajuridica->idpersonajuridica);
    }

    /*public function delete(Marca $marca)
    {
        $marca->delete();
        return back();
    }*/

    public function storeVehiculo(Request $request, Cliente $cliente)
    {
        if (!$cliente->exitsVehiculo($request->idvehiculo))
        {
            $cliente->saveVehiculo($request->idvehiculo);

            return response()->json(['success' => true]);
        }
        else
            return response()->json(['success' => false]);
    }

    public function updateVehiculo(Request $request, Cliente $cliente)
    {
        $cliente->updateVehiculo($request->idvehiculo);

        return response()->json(['success' => true]);
    }

    public function deleteVehiculo(Request $request, Cliente $cliente)
    {
        $cliente->deleteVehiculo($request->idvehiculo);

        return response()->json(['success' => true]);
    }
}