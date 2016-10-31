<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo;
use App\Marca;

class ModelosController extends Controller
{
    public function index()
	{
		$modelos=Modelo::all();
        $init_route = config('constants.init_route');

        $marcas=Marca::all();

      	return view('modelos.index', compact('modelos', 'marcas', 'init_route'));
	}

	public function store(Request $request) // $nombreModelo / $idmarca
	{
		$modelo = new Modelo ($request-> all());

		$lastModelo = Modelo::orderBy('idmodelo', 'desc')->first();
    	$newId = ($lastModelo == null) ? 1 : $lastModelo->idmodelo + 1;

    	$modelo->idmodelo = $newId;

        $modelo->save();

    	return back();

	}

	public function edit(Modelo $modelo)
	{
		$marcas=Marca::all();

		return view('modelos.edit', compact('modelo', 'marcas'));
	}

	public function update(Request $request, Modelo $modelo)
	{
		$modelo -> update($request->all());
    	return back();
	}

	public function delete( Modelo $modelo)
	{
		$modelo->delete();
		return back();

	}
}
