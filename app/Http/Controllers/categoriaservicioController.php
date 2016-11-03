<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoriaservicio;

class categoriaservicioController extends Controller
{
    public function index()
	{
		$categoriaservicios=Categoriaservicio::all();
        $init_route = config('constants.init_route');

      	return view('categoriaservicios.index', compact('categoriaservicios', 'init_route'));
      	

	}

	public function show(Categoriaservicio $categoriaservicio)
	{
		$init_route = config('constants.init_route');

		return view('categoriaservicios.details', compact('categoriaservicio', 'init_route'));
	}

	public function store(Request $request)
	{
		$categoriaservicio = new Categoriaservicio ($request-> all());
    	
        $categoriaservicio->save();

    	return back();

	}

	public function edit( Categoriaservicio $categoriaservicio)
	{
		return view('categoriaservicios.edit', compact('categoriaservicio'));


	}

	public function update(Request $request, Categoriaservicio $categoriaservicio)
	{
		$categoriaservicio -> update($request->all());
    	return back();

	}

	public function delete( Categoriaservicio $categoriaservicio)
	{
		$categoriaservicio->delete();
		return back();

	}
  
}
