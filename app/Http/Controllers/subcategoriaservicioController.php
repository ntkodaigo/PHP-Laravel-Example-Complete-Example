<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Categoriaservicio;
use App\Subcategoriaservicio;

class subcategoriaservicioController extends Controller
{
    public function index()
	{
		$subcategoriaservicios=Subcategoriaservicio::all();
        $init_route = config('constants.init_route');

        $categoriaservicios=Categoriaservicio::all();

      	return view('subcategoriaservicios.index', compact('subcategoriaservicios','categoriaservicios', 'init_route'));
      	

	}

	public function store(Request $request)
	{
		$subcategoriaservicio = new Subcategoriaservicio ($request-> all());

		$lastSubcategoriaservicio = Subcategoriaservicio::orderBy('idsubcategoriaservicio', 'desc')->first();
    	$newId = ($lastSubcategoriaservicio == null) ? 1 : $lastSubcategoriaservicio->idsubcategoriaservicio + 1;

    	$subcategoriaservicio->idsubcategoriaservicio = $newId;
    	
        $subcategoriaservicio->save();

    	return back();

	}

	public function edit( Subcategoriaservicio $subcategoriaservicio)
	{
		$categoriaservicio = Categoriaservicio::all();

		return view('subcategoriaservicios.edit', compact('subcategoriaservicio'));
	}

	public function update(Request $request, Subcategoriaservicio $subcategoriaservicio)
	{
		$subcategoriaservicio -> update($request->all());
    	return back();

	}

	public function delete( Request $request, Subcategoriaservicio $subcategoriaservicio)
	{
		$subcategoriaservicio->delete();
		return response()->json(['success' => true]);

	}

	public function data()
	{
		return Datatables::of(Subcategoriaservicio::all())->addColumn('action', function ($subcategoriaservicio) {
            
            return '<a href="/subcategoriaservicios/'.$subcategoriaservicio->idsubcategoriaservicio.'/edit">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>

            <button type="button" onclick="btnDeleteSubCategoriaServicio('.$subcategoriaservicio->idsubcategoriaservicio.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
               
            })->make(true);
	}
}
