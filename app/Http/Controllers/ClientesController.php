<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use App\Marca;

class ClientesController extends Controller
{
    public function getIndex()
    {
    	return view('marcas.search');
    }

  
    public function data()
    {
        return Datatables::of(Marca::all())->addColumn('action', function ($marca) {
                return '<a href="/marcas/'.$marca->idmarca.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <a href="#edit-'.$marca->idmarca.'"class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-bin"></i> Eliminar</a>';

            }) ->make(true);
        /*
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('marca')    ->make(true);*/
    }

    public function index()
	{

	}

    public function fillNew()
    {
    	$init_route = config('constants.init_route');
    	// CRUD?
    	$key = 'c';
    	$entityName = Cliente::$entityName;

    	return view('clientes.crud', compact('entityName', 'key', 'init_route'));
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, Cliente $cliente)
    {
    	$msg = $request->id;

      	return response()->json(array('msg'=> $msg), 200);
    }

}
