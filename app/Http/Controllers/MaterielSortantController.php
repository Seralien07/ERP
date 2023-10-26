<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\MaterielSortant;
use Illuminate\Support\Facades\DB;

class MaterielSortantController extends Controller
{
    /**
     * Display a listing of staff.
     * @return Response
     */
    public function index()
    {
        $materiel_sort = MaterielSortant::select(
                'materiel_sort.id',
                'nameMater',
                'serials',
                'quantity_sort',
                'comments',
                'materiel_sort.created_at as hiring_date',
                DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
                'staff.id as idStaff',
                'staff.post',
                'dep.name as department',
                'comp.name as compagny', 
                'mat.id as idMat',
                'mat.type',
                'cat.name as category',
                'mat.model',
                
            )
            ->join('personnel as staff', 'materiel_sort.staff_id', '=', 'staff.id')
            ->join('department as dep', 'staff.department', '=', 'dep.id')
            ->join('compagny as comp', 'staff.compagny', '=', 'comp.id')
            ->join('materiel as mat', 'materiel_sort.mat_id', '=', 'mat.id')
            ->join('category as cat', 'mat.category', '=', 'cat.id')
            ->get();

        return response()->json($materiel_sort);
    }

    /**
     * Store a newly created staff.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $materiel_sort = new MaterielSortant([
            
            'nameMater' => $request->input('nameMater'),
            'serials' => $request->input('serials'),
            'quantity_sort' => $request->input('quantity_sort'),
            'comments' => $request->input('comments'),
            'staff_id' => $request->input('staffId'), 
            'mat_id' => $request->input('matId'),   
        ]);
        $materiel_sort->save();
        return response()->json('MaterielSortant created!');
    }

    /**
     * Display the specified resource.
     * @param id $id
    */
    public function show($id)
    {
        $contact = MaterielSortant::find($id);
        return response()->json($contact);
    }

    /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function find(Request $request)
    {
        $matSort = MaterielSortant::select(
            'materiel_sort.id',
            'nameMater',
            'serials',
            'quantity_sort',
            'comments',
            'materiel_sort.created_at as hiring_date',
            DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
            'staff.id as idStaff',
            'staff.post',
            'dep.name as department',
            'comp.name as compagny',
            'mat.id as idMat',
            'mat.type',
            'cat.name as category',
            'mat.model',  
        )
        ->where('nameMater','LIKE', "%$request->toSearch%")
        ->orWhere('serials','LIKE', "%$request->toSearch%")
        ->orWhere('quantity_sort','LIKE', "%$request->toSearch%")
        ->orWhere('comments','LIKE', "%$request->toSearch%")
        ->orWhere('staff.lastname','LIKE', "%$request->toSearch%")
        ->orWhere('staff.firstname','LIKE', "%$request->toSearch%")
        ->orWhere('staff.post','LIKE', "%$request->toSearch%")
        ->orWhere('dep.name','LIKE', "%$request->toSearch%")
        ->orWhere('comp.name','LIKE', "%$request->toSearch%")
        ->orWhere('mat.type','LIKE', "%$request->toSearch%")
        ->orWhere('cat.name','LIKE', "%$request->toSearch%")
        ->orWhere('mat.model','LIKE', "%$request->toSearch%")
        ->join('personnel as staff', 'materiel_sort.staff_id', '=', 'staff.id')
        ->join('department as dep', 'staff.department', '=', 'dep.id')
        ->join('compagny as comp', 'staff.compagny', '=', 'comp.id')
        ->join('materiel as mat', 'materiel_sort.mat_id', '=', 'mat.id')
        ->join('category as cat', 'mat.category', '=', 'cat.id')
        ->get();

        return response()->json($matSort);
    }

      /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function filter(Request $request)
    {
        $matSort = MaterielSortant::select(
            'materiel_sort.id',
            'nameMater',
            'serials',
            'quantity_sort',
            'comments',
            'materiel_sort.created_at as hiring_date',
            DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
            'staff.id as idStaff',
            'staff.post',
            'dep.name as department',
            'comp.name as compagny',
            'mat.id as idMat',
            'mat.type',
            'cat.name as category',
            'mat.model',  
        )
        ->join('personnel as staff', 'credit.staff_id', '=', 'staff.id')
        ->join('department as dep', 'staff.department', '=', 'dep.id')
        ->join('compagny as comp', 'staff.compagny', '=', 'comp.id')
        ->join('materiel as mat', 'materiel_sort.mat_id', '=', 'mat.id')
        ->join('category as cat', 'mat.category', '=', 'cat.id');

        if(isset($request->category)) {
            $mat->where('cat.id', $request->category);
        }
        $mat = $mat->get();

        return response()->json($mat);
    }


    /**
     * Update the specified staff.
     * @param Request $request
     * @param id $id
     * @return Response
    */
    public function update(Request $request, $id)
    {
        $materiel_sort = MaterielSortant::find($id);

        $materiel_sort->update([
            'nameMater' => $request->input('nameMater'),
            'serials' => $request->input('serials'),
            'quantity_sort' => $request->input('quantity_sort'),
            'comments' => $request->input('comments'), 
            'staff_id' => $request->input('staffId'),
            'mat_id' => $request->input('matId'), 
        ]);
        return response()->json('MaterielSortant updated');
    }

    /**
     * Delete the specified staff.
     * @param id $id
     * @return Response
    */
    public function destroy($id)
    {
        $materiel_sort = MaterielSortant::find($id);
        $materiel_sort->delete();
        return response()->json('deleted!');  
    }
}
