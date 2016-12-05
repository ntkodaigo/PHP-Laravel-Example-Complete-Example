<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;

class ProvinciasController extends Controller
{
    public function getDistritos(Provincia $provincia)
	{
		$distritos = $provincia->distritos;
		return response()->json(['success' => true, 'distritos' => $distritos]);
	}
}
