<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Operateur;

class OperateurController extends Controller
{
        /**
     * Display a listing of compagny.
     * @return Response
     */
    public function index()
    {
        $operateur = Operateur::all();
        return response()->json($operateur);
    }
}
