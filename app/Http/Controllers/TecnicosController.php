<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Tecnico;
use App\Genero;
use App\Persona;
use App\Personanatural;
use App\Personajuridica;
use App\Nacimientocreacion;
use App\Tipodocumento;
use App\Tipotelefono;
use App\Pais;
use App\Tipoprofesion;

class TecnicosController extends Controller
{
    public function tecnicosDataToSelect()
    {
        return Datatables::of(Tecnico::with('personanatural')->get())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnSelectTecnico(\''.$entity->idtecnico.'\',\''.$entity->personanatural->nombres.' '.$entity->personanatural->apellido_paterno.' '.$entity->personanatural->apellido_materno.'\')" class="btn btn-success btn-edit"><i class="glyphicon glyphicon-edit"></i>Seleccionar</button>';
               
            })->make(true);
    }

    public function tecnicoRevisionesData(Tecnico $tecnico)
    {
        return Datatables::of($tecnico->revisions()->with('cliente.persona.personabytype', 'vehiculo', 'servicio')->get())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateRevisionForTecnico(\''.$entity->idrevision.'\',\''.$entity->idcliente.'\',\''.$entity->idvehiculo.'\','.$entity->idservicio.','.$entity->kilometrajerevision.',\''.$entity->estadorevision.'\','.$entity->tiemporeparacion.',\''.explode(' ',$entity->fecharevision)[0].'\',\''.explode(' ',$entity->fecharevisionposterior)[0].'\',\''.$entity->periodorevision.'\',\''.$entity->cliente->persona->personabytype->nombres.' '.$entity->cliente->persona->personabytype->apellido_paterno.' '.$entity->cliente->persona->personabytype->apellido_materno.'\',\''.$entity->cliente->persona->personabytype->razonsocial.'\',\''.$entity->servicio->nombreservicio.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#revision-modal"><i class="glyphicon glyphicon-edit"></i>Detalles</button>

                <button type="button" onclick="btnDeleteRevision(\''.$entity->idrevision.'\')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

    public function fillNew()
    {
    	$init_route = config('constants.init_route');
    	// CRUD?
    	$key = 'c';
    	$title = 'Registro de';
    	$entityName = Tecnico::$entityName;
    	$personaTypeName = Personanatural::$entityName;
    	$generos = Genero::all();

    	return view('personas.crud', compact('title', 'entityName', 'personaTypeName', 'key', 'generos','init_route'));
    }

    public function show(Personanatural $personanatural)
    {
    	$init_route = config('constants.init_route');
    	$title = 'Datos de';
    	// CRUD?
    	$key = 's';
    	$entityName = Tecnico::$entityName;
    	$personaTypeName = Personanatural::$entityName;
    	$generos = Genero::all();
        $tipodocumentos = Tipodocumento::all();
        $tipotelefonos = Tipotelefono::all();
        $tipoProfesiones = Tipoprofesion::all();
        $paises = Pais::all();

    	return view('personas.crud', compact('title','personaTypeName','entityName', 'key', 'generos','init_route', 'personanatural', 'tipodocumentos', 'tipotelefonos', 'tipoProfesiones', 'paises'));
    }

    public function store(Request $request)
    {
    	//return response()->json(['success' => true, 'data' => $request]);

    	$lastPersona = Persona::orderBy('idpersona', 'desc')->first();
    	$newId = ($lastPersona == null) ? 1 : $lastPersona->idpersona + 1;
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

        $newCliente = new Tecnico;
        $newPersona->tecnico()->save($newCliente);

    	$fechaNacCrea = new Nacimientocreacion;
    	$fechaNacCrea->fechanacimientocreacion = $request->fechanacimientocreacion;
		$newPersona->nacimientocreacion()->save($fechaNacCrea);

		$genero = Genero::find($request->idgenero);
		$newPerNatural = Personanatural::find($newId);
		$newPerNatural->generos()->save($genero);

        return redirect('tecnicos/show/'.$newPerNatural->idpersonanatural);

		//return redirect()->route('clientes/show/pn', ['personanatural' => $newPerNatural->idpersonanatural]);
        //return response()->json(['success' => true, 'data' => $newCliente]);
    }

    public function storeFrom(Personanatural $personanatural)
    {
        $tecnico =  new Tecnico;
        $personanatural->persona->tecnico()->save($tecnico);

        return redirect('tecnicos/show/'.$personanatural->idpersonanatural);
    }
}
