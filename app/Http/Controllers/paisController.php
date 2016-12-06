<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pais;

class paisController extends Controller
{
    public function index()
	{
		$paises=Pais::all();
        $init_route = config('constants.init_route');

      	return view('paises.index', compact('paises', 'init_route'));
	}

	public function show(Pais $pais)
	{
		$init_route = config('constants.init_route');

		return view('paises.details', compact('pais', 'init_route'));
	}

	public function store(Request $request)
	{
		$pais = new Pais ($request-> all());
    	
        $pais->save();

    	return back();
	}

	public function edit( Pais $pais)
	{
		return view('paises.edit', compact('pais'));
	}

	public function update(Request $request, Pais $pais)
	{
		$pais -> update($request->all());
    	return back();
	}

	public function delete(Pais $pais)
	{
		$pais->delete();
		return back();
	}

	public function getDepartamentos(Pais $pais)
	{
		$departamentos = $pais->departamentos;
		return response()->json(['success' => true, 'departamentos' => $departamentos]);
	}
}
