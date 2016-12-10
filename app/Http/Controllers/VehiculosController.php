<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Vehiculo;
use App\Marca;

class VehiculosController extends Controller
{
    public function vehiculosDataToSelect()
    {
        return Datatables::of(Vehiculo::with('marca','modelo')->get())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnStoreClienteVehiculo(\''.$entity->idvehiculo.'\')" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Asignar</button>

            	<button type="button" onclick="btnUpdateVehiculo(\''.$entity->idvehiculo.'\','.$entity->idmarca.','.$entity->idmodelo.',\''.$entity->aniovehiculo.'\',\''.$entity->numeroplacavehivulo.'\',\''.$entity->descripcion.'\')" class="btn btn-success btn-edit" data-toggle="modal" data-target="#vehiculo-modal"><i class="glyphicon glyphicon-edit"></i>Editar</button>

                <button type="button" onclick="btnDeleteVehiculo(\''.$entity->idvehiculo.'\')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }

    public function index()
    {
    	$marcas = Marca::all();
        $init_route = config('constants.init_route');

    	return view('vehiculos.index',  compact('marcas', 'init_route'));
    }

    public function storeAjax(Request $request)
    {
    	$last = Vehiculo::orderBy('idvehiculo', 'desc')->first();
    	$newId = ($last == null) ? 1 : $last->idvehiculo + 1;
        $newId = str_pad($newId, 8, "0", STR_PAD_LEFT);

    	$vehiculo = new Vehiculo($request->all());
    	$vehiculo->idvehiculo = $newId;
    	$vehiculo->save();

    	return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
    	$last = Vehiculo::orderBy('idvehiculo', 'desc')->first();
    	$newId = ($last == null) ? 1 : $last->idvehiculo + 1;
        $newId = str_pad($newId, 8, "0", STR_PAD_LEFT);

    	$vehiculo = new Vehiculo($request->all());
    	$vehiculo->idvehiculo = $newId;
    	$vehiculo->save();

    	return back();
    }

    public function updateAjax(Request $request, Vehiculo $vehiculo)
    {
    	$vehiculo->update($request->all());

    	return response()->json(['success' => true]);
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
    	$vehiculo->update($request->all());

    	return back();
    }

    public function delete(Request $request, Vehiculo $vehiculo)
    {
    	$vehiculo->deleteWithAllClientes();

    	if($request->ajax())
    	{
            return response()->json(['success' => true]);
        }
        
        return back();
    }
}
