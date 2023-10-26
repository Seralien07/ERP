<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Department;

class DepartmentController extends Controller
{
     /**
     * Display a listing of department.
     * @return Response
     */
    public function index()
    {
        $department = Department::all();
        return response()->json($department);
    }
}
