<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tipoprofesion;

class tipoprofesionController extends Controller
{
    public function index()
	{
		$tipoprofesions=Tipoprofesion::all();
        $init_route = config('constants.init_route');

      	return view('tipoprofesions.index', compact('tipoprofesions', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$tipoprofesion = new Tipoprofesion ($request-> all());
    	
        $tipoprofesion->save();

    	return back();

	}

	public function edit( Tipoprofesion $tipoprofesion)
	{
		return view('tipoprofesions.edit', compact('tipoprofesion'));


	}

	public function update(Request $request, Tipoprofesion $tipoprofesion)
	{
		$tipoprofesion -> update($request->all());
    	return back();

	}

	public function delete( Tipoprofesion $tipoprofesion)
	{
		$tipoprofesion->delete();
		return back();

	}
}
