<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Almacen;
use App\Compra;
use App\Producto;
use App\Http\Requests;

class AlmacenesController extends Controller
{
    public function index()
	{
		$almacenes=Almacen::all();
        $init_route = config('constants.init_route');

        $compras=Compra::all();
        $productos=Producto::all();
        
      	return view('almacenes.index', compact('almacenes', 'compras', 'productos', 'init_route'));
	}

	public function fillNew()
	{
		$key = 'c';
		$almacenes=Almacen::all();
        $init_route = config('constants.init_route');

        $compras=Compra::all();
        $productos=Producto::all();
        
      	return view('almacenes.crud', compact('almacenes', 'key', 'productos','compras', 'init_route'));
	}

	public function edit(Almacen $almacen)
	{
		$key = 'u';
        $init_route = config('constants.init_route');

        $compras=Compra::all();
        $productos=Producto::all();
        
      	return view('almacenes.crud', compact('almacen', 'key', 'productos','compras', 'init_route'));
	}

	public function store(Request $request) 
	{
		$almacen = new Almacen ($request-> all());
    	
        $almacen->save();

    	return redirect('/almacenes');

	}

	public function update(Request $request, Almacen $almacen)
	{
		$almacen -> update($request->all());
    	return back();
	}

	public function delete( Request $request, Almacen $almacen)
	{
		$almacen->delete();
		
		return response()->json(['success' => true]);

	}

	public function data()
	{
		return Datatables::of(Almacen::all())->addColumn('action', function ($almacen) {
            
            return '<a href="/almacenes/edit/'.$almacen->idalmacen.'">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>

            <button type="button" onclick="btnDeleteAlmacen('.$almacen->idalmacen.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
               
            })->make(true);
	}
}
