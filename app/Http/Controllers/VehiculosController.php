<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Vehiculo;

class VehiculosController extends Controller
{
    public function vehiculosDataToSelect()
    {
        return Datatables::of(Vehiculo::with('marca','modelo')->get())->addColumn('action', function ($entity) {
            
            return '<button type="button" onclick="btnUpdateVehiculo('.$entity->idvehiculo.','.$entity->idmarca.','.$entity->idmodelo.',\''.$entity->añovehiculo.'\',\''.$entity->numeroplacavehivulo.'\',\''.$entity->descripcion.'\')" class="btn btn-success btn-edit" 78data-toggle="modal" data-target="#vehiculo-modal"><i class="glyphicon glyphicon-edit"></i>Ver / Editar</button>

                <button type="button" onclick="btnDeleteVehiculo('.$entity->idvehiculo.')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>';
               
            })->make(true);
    }
}
