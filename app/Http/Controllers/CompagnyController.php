<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Compagny;

class CompagnyController extends Controller
{
     /**
     * Display a listing of compagny.
     * @return Response
     */
    public function index()
    {
        $compagny = Compagny::all();
        return response()->json($compagny);
    }
}
