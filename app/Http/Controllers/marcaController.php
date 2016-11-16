<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Marca;

class marcaController extends Controller
{
	public function index()
    {
        $marcas = Marca::all();
        $init_route = config('constants.init_route');

    	return view('marcas.search',  compact('marcas', 'init_route'));
    	// return view('marcas.marca', compact('marcas', 'init_route'));
    }
  
    public function data()
    {
        
        return Datatables::of(Marca::all())->addColumn('action', function ($marca) {

            
            return '<button onclick="botoneditar('.$marca->idmarca.','."'".$marca->nombremarca."'".','."'marcas/".$marca->idmarca."'".')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#marca" id="btneditar"><i class="glyphicon glyphicon-edit"></i>Edit</button>


                <a href="marcas/'.$marca->idmarca.'/delete" class="btn btn-danger" data-id="{{$marca->idmarca}}"><i class="glyphicon glyphicon-trash"></i>Delete</a>';

                
            })->make(true);

               /* <button  class="btn btn-danger btn-delete" data-id="{{$marca->idmarca}}"><i class="glyphicon glyphicon-bin"></i>Eliminar</button>';*/

           /* <a href="#edit'.$marca->idmarca.'"class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-bin"></i> Eliminar</a>';*/

            
        /*
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('marca')    ->make(true);*/
    }

	public function show(Marca $marca)
	{
		$init_route = config('constants.init_route');

		return view('marcas.details', compact('marca', 'init_route'));
	}

	public function store(Request $request)
	{
		$marca = new Marca ($request-> all());
    	
        $marca->save();

    	return back();
	}

	public function edit( Marca $marca)
	{
		return view('datatables.edit', compact('marca'));
	}

	public function update(Request $request, Marca $marca)
	{
		$marca -> update($request->all());
    	return back();
	}

	public function delete($id)
	{
		Marca::destroy($id);
		return back();
	}

}
