<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoriaproducto;
use App\Subcategoriaproducto;

class subcategoriaproductoController extends Controller
{
    public function index()
	{
		$subcategoriaproductos=Subcategoriaproducto::all();
        $init_route = config('constants.init_route');

        $categoriaproductos=Categoriaproducto::all();

      	return view('subcategoriaproductos.index', compact('subcategoriaproductos','categoriaproductos', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$subcategoriaproducto = new Subcategoriaproducto ($request-> all());

		$lastSubcategoriaproducto = Subcategoriaproducto::orderBy('idsubcategoriaproducto', 'desc')->first();
    	$newId = ($lastSubcategoriaproducto == null) ? 1 : $lastSubcategoriaproducto->idsubcategoriaproducto + 1;

    	$subcategoriaproducto->idsubcategoriaproducto = $newId;
    	
        $subcategoriaproducto->save();

    	return back();

	}

	public function edit( Subcategoriaproducto $subcategoriaproducto)
	{
		$categoriaproducto = Categoriaproducto::all();

		return view('subcategoriaproductos.edit', compact('subcategoriaproducto'));
	}

	public function update(Request $request, Subcategoriaproducto $subcategoriaproducto)
	{
		$subcategoriaproducto -> update($request->all());
    	return back();

	}

	public function delete( Subcategoriaproducto $subcategoriaproducto)
	{
		$subcategoriaproducto->delete();
		return back();

	}
}
