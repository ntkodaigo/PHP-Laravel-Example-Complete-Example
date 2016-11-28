<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
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

    	return redirect('/subcategoriaproductos');

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

	public function delete( Request $request, Subcategoriaproducto $subcategoriaproducto)
	{
		$subcategoriaproducto->delete();
		return response()->json(['success' => true]);

	}

	public function data()
	{
		return Datatables::of(Subcategoriaproducto::all())->addColumn('action', function ($subcategoriaproducto) {
            
            return '<a href="/subcategoriaproductos/'.$subcategoriaproducto->idsubcategoriaproducto.'/edit">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>

            <button type="button" onclick="btnDeleteSubCategoriaProducto('.$subcategoriaproducto->idsubcategoriaproducto.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
               
            })->make(true);
	}
}
