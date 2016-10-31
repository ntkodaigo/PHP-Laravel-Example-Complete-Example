<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tipodocumento;

class tipodocumentoController extends Controller
{
    public function index()
	{
		$tipodocumentos=Tipodocumento::all();
        $init_route = config('constants.init_route');

      	return view('tipodocumentos.index', compact('tipodocumentos', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$tipodocumento = new Tipodocumento ($request-> all());
    	
        $tipodocumento->save();

    	return back();

	}

	public function edit( Tipodocumento $tipodocumento)
	{
		return view('tipodocumentos.edit', compact('tipodocumento'));


	}

	public function update(Request $request, Tipodocumento $tipodocumento)
	{
		$tipodocumento -> update($request->all());
    	return back();

	}

	public function delete( Tipodocumento $tipodocumento)
	{
		$tipodocumento->delete();
		return back();

	}
}
