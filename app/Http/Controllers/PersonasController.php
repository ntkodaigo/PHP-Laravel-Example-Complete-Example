<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Persona;

class PersonasController extends Controller
{
	public function personasMorphData()
	{
		return Datatables::of(Persona::with('personabytype')->get())->addColumn('action', function ($entity) {
            
            return '<button data-toggle="modal" data-target="#roles-modal" type="button" onclick="btnAllRoles('.$entity->idpersona.')" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Roles</button>';
               
        	})->make(true);
	}

	public function index()
	{
		return view('personas.index');
	}

    public function updateNC(Request $request, Persona $persona)
    {
        $persona->nacimientocreacion() -> update($request->all());

        return response()->json(['success' => true]);
    }
}
