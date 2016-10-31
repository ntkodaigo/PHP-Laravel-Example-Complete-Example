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

      	return view('marcas.index', compact('marcas', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$marca = new Marca ($request-> all());
    	
        $marca->save();

    	return back();

	}

	public function edit( Marca $marca)
	{
		return view('marcas.edit', compact('marca'));


	}

	public function update(Request $request, Marca $marca)
	{
		$marca -> update($request->all());
    	return back();

	}

	public function delete( Marca $marca)
	{
		$marca->delete();
		return back();

	}
}
