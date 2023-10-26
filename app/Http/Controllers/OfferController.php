<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Offer;

class OfferController extends Controller
{
         /**
     * Display a listing of offer.
     * @return Response
     */
    public function index()
    {
        $offer = Offer::all();
        return response()->json($offer);
    }
}
