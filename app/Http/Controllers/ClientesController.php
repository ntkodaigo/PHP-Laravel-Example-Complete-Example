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
        return Datatables::of(Marca::all())->make(true);
    }
}
