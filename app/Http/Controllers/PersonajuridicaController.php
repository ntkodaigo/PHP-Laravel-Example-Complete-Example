<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personajuridica;

class PersonajuridicaController extends Controller
{
    public function update(Request $request, Personajuridica $personajuridica)
    {
    	$personajuridica -> update($request->all());

        return response()->json(['success' => true]);
    }
}
