<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Subcategoriaproducto;
use App\Categoriaproducto;
use App\Http\Requests;

class ProductosController extends Controller
{
    public function index()
	{
		$productos=Producto::all();
        $init_route = config('constants.init_route');

        $subcategoriaproductos=Subcategoriaproducto::all();

        $categoriaproductos=Categoriaproducto::all();
        
      	return view('productos.index', compact('productos', 'categoriaproductos','subcategoriaproductos', 'init_route'));
	}

	public function store(Request $request) 
	{
		$producto = new Producto ($request-> all());

		$lastProducto = Producto::orderBy('idproducto', 'desc')->first();
    	$newId = ($lastProducto == null) ? 1 : $lastProducto->idproducto + 1;

    	$producto->idproducto = $newId;

        $producto->save();

    	return back();

	}

	public function edit(Producto $producto)
	{
		$articulos=Articulo::all();

		return view('productos.edit', compact('producto', 'articulos'));
	}

	public function update(Request $request, Producto $producto)
	{
		$producto -> update($request->all());
    	return back();
	}

	public function delete( Producto $producto)
	{
		$producto->delete();
		return back();

	}
}
