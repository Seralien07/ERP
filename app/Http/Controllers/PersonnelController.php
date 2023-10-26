<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Department;
use App\Models\Compagny;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{
    /**
     * Display a listing of staff.
     * @return Response
     */
    public function index()
    {
        $personnel = Personnel::select(
                'personnel.id',
                'lastname',
                'firstname',
                DB::raw('CONCAT(lastname," ",firstname) AS fullname'),
                'email',
                'post',
                'dep.name as department',
                'comp.name as compagny',
                'personnel.created_at as hiring_date',
                'resignation_date'
            )
            ->join('department as dep', 'personnel.department', '=', 'dep.id')
            ->join('compagny as comp', 'personnel.compagny', '=', 'comp.id')
            ->get();

        return response()->json($personnel);
    }

    /**
     * Store a newly created staff.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $personnel = new Personnel([
            'lastname' => $request->input('lastName'),
            'firstname' => $request->input('firstName'),
            'email' => $request->input('email'),
            'post' => $request->input('post'),
            'department' => $request->input('department'),
            'compagny' => $request->input('compagny'),
        ]);
        $personnel->save();
        return response()->json('Personnel created!');
    }

    /**
     * Display the specified resource.
     * @param id $id
    */
    public function show($id)
    {
        $contact = Personnel::find($id);
        return response()->json($contact);
    }

    /**
     * Search staff.
     * @param Request $request
     * @return array
    */
    public function find(Request $request)
    {
        $staff = Personnel::select(
            'personnel.id',
            'lastname',
            'firstname',
            'email',
            'post',
            'dep.name as department',
            'comp.name as compagny',
            'personnel.created_at as hiring_date',
            'resignation_date'
        )
        ->where('lastname','LIKE', "%$request->toSearch%")
        ->orWhere('firstname','LIKE', "%$request->toSearch%")
        ->orWhere('email','LIKE', "%$request->toSearch%")
        ->orWhere('post','LIKE', "%$request->toSearch%")
        ->orWhere('dep.name','LIKE', "%$request->toSearch%")
        ->orWhere('comp.name','LIKE', "%$request->toSearch%")
        ->join('department as dep', 'personnel.department', '=', 'dep.id')
        ->join('compagny as comp', 'personnel.compagny', '=', 'comp.id')
        ->get();

        return response()->json($staff);
    }

    /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function filter(Request $request)
    {
        $staff = Personnel::select(
            'personnel.id',
            'lastname',
            'firstname',
            'email',
            'post',
            'dep.name as department',
            'comp.name as compagny',
            'personnel.created_at as hiring_date',
            'resignation_date'
        )
        ->join('department as dep', 'personnel.department', '=', 'dep.id')
        ->join('compagny as comp', 'personnel.compagny', '=', 'comp.id');

        if(isset($request->department)) {
            $staff->where('dep.id', $request->department);
        }
        if(isset($request->compagny)) {
            $staff->where('comp.id', $request->compagny);
        }
        $staff = $staff->get();

        return response()->json($staff);
    }

    /**
     * Update the specified staff.
     * @param Request $request
     * @param id $id
     * @return Response
    */
    public function update(Request $request, $id)
    {
        $idDepartment = Department::where('name', $request->input('department'))->pluck('id');
        $idCompagny = Compagny::where('name', $request->input('compagny'))->pluck('id');
        $personnel = Personnel::find($id);

        $personnel->update([
            'lastname' => $request->input('lastName'),
            'firstname' => $request->input('firstName'),
            'email' => $request->input('email'),
            'post' => $request->input('post'),
            'department' => $idDepartment[0],
            'compagny' => $idCompagny[0],
        ]);
        return response()->json('Personnel updated');
    }

    /**
     * Delete the specified staff.
     * @param id $id
     * @return Response
    */
    public function destroy($id)
    {
        $personnel = Personnel::find($id);
        $personnel->delete();
        return response()->json('deleted!');  
    }
}
