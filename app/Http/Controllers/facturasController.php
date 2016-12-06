<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Factura;
use App\Articulo;
use App\cliente;


class facturasController extends Controller
{
    public function index()
    {
    	$facturas=Factura::all();
    	$key = 'c';

    	$articulos=Articulo::all();
    	$clientes=Cliente::all();

    	$init_route=config('constants.init_route');
    	return view('clientes.factura', compact('facturas','key','articulos','clientes','init_route'));
    }

    public function fillNew()
    {
    	$key='c';
    	$facturas=Factura::all();
    	$init_route=config('constants.init_route');

    	$articulos=Articulo::all();
    	$clientes=Cliente::all();

    	return view('facturas.crud',compact('facturas','key','articulos','clientes','init_route'));

    }

    public function edit(Factura $factura)
    {
    	$key='u';
    	$init_route=config('constants.init_route');
    	$articulos=Articulo::all();
    	$clientes=Cliente::all();

    	return view('facturas.crud',compact('facturas','key','articulos','clientes','init_route'));
    }

    public function store(Request $request)
    {
    	$factura=new Factura($request -> all());
    	//Falta
    }

    public function update(Request $request, Factura $factura)
    {
    	$factura ->update($request-> all());
    	return back();
    }

    public  function delete(Request $request, Factura $factura)
    {
    	$factura->dekete();
    	return response()->json(['success'=>true]);
    }

    public function data()
    {
    	/*return Datatables::of(Factura::all());
    	addCollum('action',function ($factura)){

    		//return ;
    	})->make(true);*/
    }
}

    


