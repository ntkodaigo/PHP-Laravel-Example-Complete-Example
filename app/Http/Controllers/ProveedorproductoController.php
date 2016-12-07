<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Producto;
use App\Proveedor;
use App\Proveedorproducto;
use App\Http\Requests;

class ProveedorproductoController extends Controller
{
    public function index()
	{
		$proveedorproductos=Proveedorproducto::all();
        $init_route = config('constants.init_route');

        $productos=Producto::all();
        
      	return view('proveedorproductos.index', compact('proveedorproductos', 'productos', 'init_route'));
	}

	public function fillNew()
	{
		$key = 'c';
		$proveedorproductos=Proveedorproducto::all();
        $init_route = config('constants.init_route');

        $productos=Producto::all();
        $proveedor=Proveedor::all();
        
      	return view('proveedorproductos.crud', compact('proveedorproductos', 'key', 'productos', 'init_route'));
	}

	public function edit(Proveedorproducto $proveedorproducto)
	{
		$key = 'u';
        $init_route = config('constants.init_route');

        $proveedorproductos=Proveedorproducto::all();
        $productos=Producto::all();
        
      	return view('proveedorproductos.crud', compact('proveedorproducto', 'key', 'productos', 'init_route'));
	}

	public function store(Request $request) 
	{
    	$proveedorproductos = new Proveedorproducto($request->all());
    	$proveedorproductos->save();
    	return back();

	}

	public function update(Request $request, Proveedorproducto $proveedorproducto)
	{
		$proveedorproducto -> update($request->all());
    	return back();
	}

	public function delete( Request $request, Proveedorproducto $proveedorproducto)
	{
		$proveedorproducto->delete();
		
		return response()->json(['success' => true]);

	}

	public function data()
	{
		return Datatables::of(Compra::all())->addColumn('action', function ($proveedorproducto) {
            
            return '<a href="/compras/edit/'.$proveedorproducto->idproveedor.'">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>

            <button type="button" onclick="btnDeleteCompras('.$proveedorproducto->idproveedor.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
               
            })->make(true);
	}
}
