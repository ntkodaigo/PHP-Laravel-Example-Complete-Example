<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Pais;

class DepartamentoController extends Controller
{
     public function index()
	{
		$departamentos=Departamento::all();
        $init_route = config('constants.init_route');

        $pais=Pais::all();

      	return view('departamentos.index', compact('departamentos', 'pais', 'init_route'));
	}

	public function store(Request $request) // $nombreModelo / $idmarca
	{
		$departamento = new Departamento ($request-> all());

		$lastDepartamento = Departamento::orderBy('iddedepartamento', 'desc')->first();
    	$newId = ($lastDepartamento == null) ? 1 : $lastDepartamento->iddepartamento + 1;

    	$departamento->iddepartamento = $newId;

        $departamento->save();

    	return back();

	}

	public function edit(Departamento $departamento)
	{
		$pais=Pais::all();

		return view('departamentos.edit', compact('departamento', 'pais'));
	}

	public function update(Request $request, Departamento $departamento)
	{
		$departamento -> update($request->all());
    	return back();
	}

	public function delete( Departamento $departamento)
	{
		$departamento->delete();
		return back();

	}

	public function getProvincias(Departamento $departamento)
	{
		$provincias = $departamento->provincias;
		return response()->json(['success' => true, 'provincias' => $provincias]);
	}
}
