<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Servicio;
use App\Subcategoriaservicio;
use App\Categoriaservicio;
use App\Articulo;
use App\Http\Requests;

class ServiciosController extends Controller
{
	public function serviciosDataToSelect()
    {
        return Datatables::of(Servicio::with('categoriaservicio', 'subcategoriaservicio')->get())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnSelectServicio('.$entity->idservicio.',\''.$entity->nombreservicio.'\')" class="btn btn-success btn-edit"><i class="glyphicon glyphicon-edit"></i>Seleccionar</button>';
               
            })->make(true);
    }

    public function index()
	{
		$servicios=Servicio::all();
        $init_route = config('constants.init_route');

        $subcategoriaservicios=Subcategoriaservicio::all();

        $categoriaservicios=Categoriaservicio::all();
        
      	return view('servicios.index', compact('servicios', 'categoriaservicios','subcategoriaservicios', 'init_route'));
	}

	public function fillNew()
	{
		$key = 'c';
		$servicios=Servicio::all();
        $init_route = config('constants.init_route');

        $subcategoriaservicios=Subcategoriaservicio::all();

        $categoriaservicios=Categoriaservicio::all();
        
      	return view('servicios.crud', compact('servicios', 'key', 'categoriaservicios','subcategoriaservicios', 'init_route'));
	}

	public function edit(Servicio $servicio)
	{
		$key = 'u';
        $init_route = config('constants.init_route');

        $subcategoriaservicios=Subcategoriaservicio::all();

        $categoriaservicios=Categoriaservicio::all();
        
      	return view('servicios.crud', compact('servicio', 'key', 'categoriaservicios','subcategoriaservicios', 'init_route'));
	}

	public function store(Request $request) 
	{
		$servicio = new Servicio ($request-> all());
		$articulo = new Articulo;
		$lastArticulo = Articulo::orderBy('idarticulo', 'desc')->first();
    	$newId = ($lastArticulo == null) ? 1 : $lastArticulo->idarticulo + 1;

    	$servicio->idservicio = $newId;
    	$servicio->myarticulo()->save($articulo);
    	$articulo->idarticulo = $newId;
    	$articulo->servicio()->save($servicio);

    	return redirect('/servicios');

	}

	public function update(Request $request, Servicio $servicio)
	{
		$servicio -> update($request->all());
    	return back();
	}

	public function delete( Request $request, Servicio $servicio)
	{
		$servicio->delete();
		
		return response()->json(['success' => true]);

	}

	public function data()
	{
		return Datatables::of(Servicio::all())->addColumn('action', function ($servicio) {
            
            return '<a href="/servicios/edit/'.$servicio->idservicio.'">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>

            <button type="button" onclick="btnDeleteServicio('.$servicio->idservicio.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
               
            })->make(true);
	}
}
