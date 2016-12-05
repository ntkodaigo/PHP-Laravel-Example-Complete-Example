<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personanatural;

class PersonanaturalController extends Controller
{
    public function updateGenero(Request $request, Personanatural $personanatural)
    {
    	$personanatural->updateGenero($request->idgenero);

    	return response()->json(['success' => true]);
    }
}
