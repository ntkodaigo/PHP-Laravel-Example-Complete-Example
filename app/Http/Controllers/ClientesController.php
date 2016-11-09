<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
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
