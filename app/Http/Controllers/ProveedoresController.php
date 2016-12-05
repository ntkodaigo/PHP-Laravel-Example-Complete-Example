<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Proveedor;

class ProveedoresController extends Controller
{
    public function proveedoresMorphData()
	{
		return Datatables::of(Proveedor::with('persona.personabytype')->get())->addColumn('action', function ($entity) {
            
            return '<button data-toggle="modal" data-target="#roles-modal" type="button" onclick="btnAllRoles('.$entity->idpersona.')" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Roles</button>';
               
        	})->make(true);
	}
}
