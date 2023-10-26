<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Voice;

class VoiceController extends Controller
{
         /**
     * Display a listing of offer.
     * @return Response
     */
    public function index()
    {
        $voice = Voice::all();
        return response()->json($voice);
    }
}
