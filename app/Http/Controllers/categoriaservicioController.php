<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
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

    	return redirect('/categoriaservicios');

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

	public function delete( Request $request, Categoriaservicio $categoriaservicio)
	{
		$categoriaservicio->delete();
		return response()->json(['success' => true]);
	}

	public function data()
	{
		return Datatables::of(Categoriaservicio::all())->addColumn('action', function ($categoriaservicio) {
            
            return '<a href="/categoriaservicios/'.$categoriaservicio->idcategoriaservicio.'/edit">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>

            <button type="button" onclick="btnDeleteCategoriaServicio('.$categoriaservicio->idcategoriaservicio.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
               
            })->make(true);
	}
  
}
