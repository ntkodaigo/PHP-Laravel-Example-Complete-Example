<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use App\Marca;
use App\Cliente;
use App\Genero;

class ClientesController extends Controller
{
    public function getIndex()
    {
        $marcas = Marca::all();
    	return view('marcas.search', compact('marcas'));
    }
  
    public function data()
    {
        
        return Datatables::of(Marca::all())->addColumn('action', function ($marca) {

            
            return '<button onclick="botoneditar('.$marca->idmarca.','."'".$marca->nombremarca."'".','."'marcas/".$marca->idmarca."'".')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#marca" id="btneditar"><i class="glyphicon glyphicon-edit"></i>Edit</button>


                <a href="marcas/'.$marca->idmarca.'/delete" class="btn btn-danger" data-id="{{$marca->idmarca}}"><i class="glyphicon glyphicon-bin"></i>Delete</a>';

                
            })->make(true);

               /* <button  class="btn btn-danger btn-delete" data-id="{{$marca->idmarca}}"><i class="glyphicon glyphicon-bin"></i>Eliminar</button>';*/

           /* <a href="#edit'.$marca->idmarca.'"class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-bin"></i> Eliminar</a>';*/

            
        /*
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('marca')    ->make(true);*/
    }

    public function edit(Marca $marca, Request $request)
    {
        return view('marcas.edit', compact('marca'));
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
    	$generos = Genero::all();

    	return view('clientes.crud', compact('entityName', 'key', 'generos','init_route'));
    }

    public function store(Request $request)
    {
        return view('marcas.edit', compact('marca'));

    }

    public function update(Request $request, Marca $marca)
    {
    	$marca -> update($request->all());
        return back();
    }



    public function delete( Marca $marca)
    {

        $marca->delete();
        return back();

    }
}




