<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Almacen;
use App\Compra;
use App\Producto;
use App\Http\Requests;

class ComprasController extends Controller
{
    public function index()
	{
		$almacenes=Almacen::all();
        $init_route = config('constants.init_route');

        $compras=Compra::all();
        
      	return view('compras.index', compact('almacenes', 'compras', 'init_route'));
	}

	public function fillNew()
	{
		$key = 'c';
		$almacenes=Almacen::all();
        $init_route = config('constants.init_route');

        $compras=Compra::all();
        $productos=Producto::all();
        
      	return view('compras.crud', compact('almacenes', 'key', 'productos','compras', 'init_route'));
	}

	public function edit(Compra $compra)
	{
		$key = 'u';
        $init_route = config('constants.init_route');

        $compras=Compra::all();
        $productos=Producto::all();
        
      	return view('compras.crud', compact('compra', 'key', 'productos','almacenes', 'init_route'));
	}

	public function store(Request $request) 
	{
		$last = Compra::orderBy('idcompra', 'desc')->first();
    	$newId = ($last == null) ? 1 : $last->idcompra + 1;

    	$compras = new Compra($request->all());
    	$compras->idcompra = $newId;
    	$compras->save();

    	return back();

	}

	public function update(Request $request, Compra $compra)
	{
		$compra -> update($request->all());
    	return back();
	}

	public function delete( Request $request, Compra $compra)
	{
		$compra->delete();
		
		return response()->json(['success' => true]);

	}

	public function data()
	{
		return Datatables::of(Compra::all())->addColumn('action', function ($compra) {
            
            return '<a href="/compras/edit/'.$compra->idcompra.'">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>

            <button type="button" onclick="btnDeleteCompras('.$compra->idcompra.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
               
            })->make(true);
	}

	public function dataProveedor(Proveedor $proveedor)
	{
		return Datatables::of($proveedor->compras)->addColumn('action', function ($producto) {
            
            return '<button type="button" onclick="AgregarProducto('.$producto->idproducto.','.$producto->idcategoriaproducto.','.$producto->idsubcategoriaproducto.')" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i>Agregar</button>';
               
            })->make(true);
	}
}
