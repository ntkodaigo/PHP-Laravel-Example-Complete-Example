<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tipotelefono;

class tipotelefonoController extends Controller
{
    public function index()
	{
		$tipotelefonos=Tipotelefono::all();
        $init_route = config('constants.init_route');

      	return view('tipotelefonos.index', compact('tipotelefonos', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$tipotelefono = new Tipotelefono ($request-> all());
    	
        $tipotelefono->save();

    	return back();

	}

	public function edit( Tipotelefono $tipotelefono)
	{
		return view('tipotelefonos.edit', compact('tipotelefono'));


	}

	public function update(Request $request, Tipotelefono $tipotelefono)
	{
		$tipotelefono -> update($request->all());
    	return back();

	}

	public function delete( Tipotelefono $tipotelefono)
	{
		$tipotelefono->delete();
		return back();

	}
}
