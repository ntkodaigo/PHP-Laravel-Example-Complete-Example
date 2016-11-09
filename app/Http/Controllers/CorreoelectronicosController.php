<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Correoelectronico;

class CorreoelectronicosController extends Controller
{
    public function index()
	{
		$correoelectronicos=Correoelectronico::all();
        $init_route = config('constants.init_route');

      	return view('correoelectronicos.index', compact('correoelectronicos', 'init_route'));
	}

	public function show(Correoelectronico $correoelectronico)
	{
		$init_route = config('constants.init_route');

		return view('correoelectronicos.details', compact('correoelectronico', 'init_route'));
	}

	public function store(Request $request)
	{
		$correoelectronico = new Correoelectronico ($request-> all());
    	
        $correoelectronico->save();

    	return back();

	}

	public function edit( Correoelectronico $correoelectronico)
	{
		return view('correoelectronicos.edit', compact('correoelectronico'));


	}

	public function update(Request $request, Correoelectronico $correoelectronico)
	{
		$correoelectronico -> update($request->all());
    	return back();

	}

	public function delete( Correoelectronico $correoelectronico)
	{
		$correoelectronico->delete();
		return back();

	}
}
