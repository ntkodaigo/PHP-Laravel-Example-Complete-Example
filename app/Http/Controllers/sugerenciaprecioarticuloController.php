<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Sugerenciaprecioarticulo;

class sugerenciaprecioarticuloController extends Controller
{
    public function index()
	{
		$sugerenciaprecioarticulos=Sugerenciaprecioarticulo::all();
        $init_route = config('constants.init_route');

        $articulos=Articulo::all();

      	return view('sugerenciaprecioarticulos.index', compact('sugerenciaprecioarticulos','articulos', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$sugerenciaprecioarticulo = new Sugerenciaprecioarticulo ($request-> all());

		$lastSugerenciaprecioarticulo = Sugerenciaprecioarticulo::orderBy('idsugerenciaprecioarticulo', 'desc')->first();
    	$newId = ($lastSugerenciaprecioarticulo == null) ? 1 : $lastSugerenciaprecioarticulo->idsugerenciaprecioarticulo + 1;

    	$sugerenciaprecioarticulo->idsugerenciaprecioarticulo = $newId;
    	
        $sugerenciaprecioarticulo->save();

    	return back();

	}

	public function edit( Sugerenciaprecioarticulo $sugerenciaprecioarticulo)
	{
		$articulos = Articulo::all();

		return view('sugerenciaprecioarticulos.edit', compact('sugerenciaprecioarticulo'));
	}

	public function update(Request $request, Sugerenciaprecioarticulo $sugerenciaprecioarticulo)
	{
		$sugerenciaprecioarticulo -> update($request->all());
    	return back();

	}

	public function delete( Sugerenciaprecioarticulo $sugerenciaprecioarticulo)
	{
		$sugerenciaprecioarticulo->delete();
		return back();

	}
}
