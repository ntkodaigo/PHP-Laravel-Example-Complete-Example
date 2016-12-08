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

    public function storeFromCliente(Request $request, Cliente $cliente)
    {
    	$last = Factura::orderBy('idfactura', 'desc')->first();
        $newId = ($last == null) ? 1 : $last->idfactura + 1;
        $newId = str_pad($newId, 10, "0", STR_PAD_LEFT);

        $factura = new Factura($request -> all());
    	$factura->idfactura = $newId;

        $cliente->facturas()->save($factura);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, Factura $factura)
    {
    	$factura ->update($request-> all());
    	return back();
    }

    public  function delete(Request $request, Factura $factura)
    {
    	$factura->delete();
    	return response()->json(['success'=>true]);
    }

    public function facturasData()
    {
        return Datatables::of(Factura::with('articulo.articulobytype')->get())->addColumn('action', function ($entity) {
            
            return '<button data-toggle="modal" data-target="#roles-modal" type="button" onclick="btnSetInvalidFactura(\''.$entity->idfactura.'\')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Anular</button>

                <button data-toggle="modal" data-target="#roles-modal" type="button" onclick="btnSetValidFactura(\''.$entity->idfactura.'\')" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Revalidar</button>'
                ;
               
            })->make(true);
    }

    public function setinvalid(Request $request, Factura $factura)
    {
        $factura->update(['estado' => 'ANULADO']);

        return response()->json(['success'=>true]);
    }

    public function setvalid(Request $request, Factura $factura)
    {
        $factura->update(['estado' => 'VALIDO']);

        return response()->json(['success'=>true]);
    }
}

    


