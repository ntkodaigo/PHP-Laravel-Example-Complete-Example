<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Genero;

class generoController extends Controller
{
    public function index()
	{
		$generos=Genero::all();
        $init_route = config('constants.init_route');

      	return view('generos.index', compact('generos', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$genero = new Genero ($request-> all());
    	
        $genero->save();

    	return back();

	}

	public function edit( Genero $genero)
	{
		return view('generos.edit', compact('genero'));


	}

	public function update(Request $request, Genero $genero)
	{
		$genero -> update($request->all());
    	return back();

	}

	public function delete( Genero $genero)
	{
		$genero->delete();
		return back();

	}
  
}
