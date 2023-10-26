<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;

class CategoryController extends Controller
{
         /**
     * Display a listing of category.
     * @return Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }
}
