<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Marca;

class marcaController extends Controller
{
    public function index()
	{
		$marcas=Marca::all();
        $init_route = config('constants.init_route');

      	return view('marcas.marca', compact('marcas', 'init_route'));
	}
/*
	public function newMarca(Request $request)
	{
		if ($request -> ajax()) 
		{
			$marca=Marca::create($request->all());
			return response()->json($marca);
		}
	}
*/
	public function show(Marca $marca)
	{
		$init_route = config('constants.init_route');

		return view('marcas.details', compact('marca', 'init_route'));
	}

	public function store(Request $request)
	{
		$marca = new Marca ($request-> all());
    	
        $marca->save();

    	return back();

	}

	public function edit( Marca $marca)
	{
		return view('datatables.edit', compact('marca'));
	}

	public function update(Request $request, Marca $marca)
	{
		$marca -> update($request->all());
    	return back();

	}

	public function delete($id)
	{
		
		Marca::destroy($id);
		return back();

	}


	
}
