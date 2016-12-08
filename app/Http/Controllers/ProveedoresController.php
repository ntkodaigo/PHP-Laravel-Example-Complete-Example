<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Proveedor;

use APP\Proveedorproducto;

use App\Genero;
use App\Persona;
use App\Personanatural;
use App\Personajuridica;
use App\Nacimientocreacion;
use App\Tipodocumento;
use App\Tipotelefono;
use App\Pais;
use App\Tipoprofesion;
use App\Producto;

class ProveedoresController extends Controller
{
    public function proveedoresMorphData()
	{
		return Datatables::of(Proveedor::with('persona.personabytype')->get())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="AgregarProveedor('.$entity->idproveedor.')" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i>Agregar</button>';
               
        	})->make(true);
	}


	public function proveedoresProductoMorphData()
	{
		return Datatables::of(Proveedorproducto::All())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="AgregarProveedor('.$entity->idproveedor.')" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i>Agregar</button>';
               
        	})->make(true);
	}

	public function storeProducto(Request $request, Proveedor $proveedor)
    {
        if (!$proveedor->exitsProducto($request->idproducto))
        {
            $proveedor->saveProducto($request->idproducto);

            return response()->json(['success' => true]);
        }
        else
            return response()->json(['success' => false]);
    }

    public function deleteProducto(Request $request, Proveedor $proveedor)
    {

        $proveedor->deleteProducto($request->idproducto);

        return response()->json(['success' => true]);
    
    }

	public function fillNewPN()
    {
    	$init_route = config('constants.init_route');
    	// CRUD?
    	$key = 'c';
    	$title = 'Registro de';
    	$entityName = Proveedor::$entityName;
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
    	$entityName = Proveedor::$entityName;
    	$personaTypeName = Personanatural::$entityName;
    	$generos = Genero::all();
        $tipodocumentos = Tipodocumento::all();
        $tipotelefonos = Tipotelefono::all();
        $tipoProfesiones = Tipoprofesion::all();
        $paises = Pais::all();

    	return view('personas.crud', compact('title','personaTypeName','entityName', 'key', 'generos','init_route', 'personanatural', 'tipodocumentos', 'tipotelefonos', 'tipoProfesiones', 'paises'));
    }

    public function storePN(Request $request)
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

        $newCliente = new Proveedor;
        $newPersona->proveedor()->save($newCliente);

    	$fechaNacCrea = new Nacimientocreacion;
    	$fechaNacCrea->fechanacimientocreacion = $request->fechanacimientocreacion;
		$newPersona->nacimientocreacion()->save($fechaNacCrea);

		$genero = Genero::find($request->idgenero);
		$newPerNatural = Personanatural::find($newId);
		$newPerNatural->generos()->save($genero);

        return redirect('proveedores/show/pn/'.$newPerNatural->idpersonanatural);

		//return redirect()->route('clientes/show/pn', ['personanatural' => $newPerNatural->idpersonanatural]);
        //return response()->json(['success' => true, 'data' => $newCliente]);
    }

    public function storeFromPN(Personanatural $personanatural)
    {
        $proveedor =  new Proveedor;
        $personanatural->persona->proveedor()->save($proveedor);

        return redirect('proveedores/show/pn/'.$personanatural->idpersonanatural);
    }

    public function fillNewPJ()
    {
        $init_route = config('constants.init_route');
        // CRUD?
        $key = 'c';
        $title = 'Registro de';
        $entityName = Proveedor::$entityName;
        $personaTypeName = Personajuridica::$entityName;

        return view('personas.crud', compact('title', 'entityName', 'personaTypeName', 'key', 'init_route'));
    }

    public function showPJ(Personajuridica $personajuridica)
    {
        $init_route = config('constants.init_route');
        $title = 'Datos de';
        // CRUD?
        $key = 's';
        $entityName = Proveedor::$entityName;
        $personaTypeName = Personajuridica::$entityName;
        $tipodocumentos = Tipodocumento::all();
        $tipotelefonos = Tipotelefono::all();
        $tipoProfesiones = Tipoprofesion::all();
        $paises = Pais::all();

        return view('personas.crud', compact('title','personaTypeName','entityName', 'key', 'init_route', 'personajuridica', 'tipodocumentos', 'tipotelefonos', 'tipoProfesiones', 'paises'));
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

        $newCliente = new Proveedor;
        $newPersona->proveedor()->save($newCliente);

        $fechaNacCrea = new Nacimientocreacion;
        $fechaNacCrea->fechanacimientocreacion = $request->fechanacimientocreacion;
        $newPersona->nacimientocreacion()->save($fechaNacCrea);

        return redirect('proveedores/show/pj/'.$newPerJuridica->idpersonajuridica);
    }

    public function storeFromPJ(Personajuridica $personajuridica)
    {
        $proveedor =  new Proveedor;
        $personajuridica->persona->proveedor()->save($proveedor);

        return redirect('proveedores/show/pj/'.$personajuridica->idpersonajuridica);

    }

    public function dataProducto(Producto $producto)
    {
        return Datatables::of($producto->proveedores()->with('persona.personabytype')->get())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnSelectAll(\''.$entity->idproveedor.'\', '.$entity->pivot->idproducto.')" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i>Agregar</button>';
               
            })->make(true);
    }
}
