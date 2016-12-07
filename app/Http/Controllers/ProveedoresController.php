<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Proveedor;
use APP\Proveedorproducto;

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
}
