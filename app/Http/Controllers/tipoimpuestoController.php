<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tipoimpuesto;

class tipoimpuestoController extends Controller
{
	public function index()
	{
		$tipoimpuestos=Tipoimpuesto::all();
        $init_route = config('constants.init_route');

      	return view('tipoimpuestos.index', compact('tipoimpuestos', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$tipoimpuesto = new Tipoimpuesto ($request-> all());
    	
        $tipoimpuesto->save();

    	return back();

	}

	public function edit( Tipoimpuesto $tipoimpuesto)
	{
		return view('tipoimpuestos.edit', compact('tipoimpuesto'));


	}

	public function update(Request $request, Tipoimpuesto $tipoimpuesto)
	{
		$tipoimpuesto -> update($request->all());
    	return back();

	}

	public function delete( Tipoimpuesto $tipoimpuesto)
	{
		$tipoimpuesto->delete();
		return back();

	}
  
}
