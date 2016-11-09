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
                return '<a href="#edit-'.$marca->idmarca.'"class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <a href="#edit-'.$marca->idmarca.'"class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-bin"></i> Eliminar</a>';

            }) ->make(true);
        /*
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('nombremarca')    ->make(true);*/
    }


}
