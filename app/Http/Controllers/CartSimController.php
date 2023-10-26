<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\CartSim;
use App\Models\Operateur;
use Illuminate\Support\Facades\DB;

class CartSimController extends Controller
{
    /**
     * Display a listing of staff.
     * @return Response
     */
    public function index()
    {
        $cart_sim = CartSim::select(
                'cart_sim.id',
                'operateur as idOperator',
                'opet.name as operateur',
                'line',
                'number_sim',
                'cart_sim.created_at as hiring_date',
                 DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
                'staff.id as idStaff',
                'staff.post',
                'dep.name as department',
                'comp.name as compagny',
            )
            ->join('operateur as opet', 'cart_sim.operateur', '=', 'opet.id')
            ->join('personnel as staff', 'cart_sim.staff_id', '=', 'staff.id')
            ->join('department as dep', 'staff.department', '=', 'dep.id')
            ->join('compagny as comp', 'staff.compagny', '=', 'comp.id')
            ->get();

        return response()->json($cart_sim);
    }

    /**
     * Store a newly created staff.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $cart_sim = new CartSim([
            'operateur' => $request->input('operateur'),
            'line' => $request->input('line'),
            'number_sim' => $request->input('number_sim'),
            'staff_id' => $request->input('staffId'),
        ]);
        $cart_sim->save();
        return response()->json('CartSim created!');
    }

    /**
     * Display the specified resource.
     * @param id $id
    */
    public function show($id)
    {
        $contact = CartSim::find($id);
        return response()->json($contact);
    }

    /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function find(Request $request)
    {
        $sim = CartSim::select(
            'cart_sim.id',
            'operateur as idOperator',
            'opet.name as operateur',
            'line',
            'number_sim',
            'cart_sim.created_at as hiring_date',
             DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
            'staff.id as idStaff',
            'staff.post',
            'dep.name as department',
            'comp.name as compagny',
        )
        ->orWhere('opet.name','LIKE', "%$request->toSearch%")
        ->orWhere('line','LIKE', "%$request->toSearch%")
        ->orWhere('staff.lastname','LIKE', "%$request->toSearch%")
        ->orWhere('staff.firstname','LIKE', "%$request->toSearch%")
        ->orWhere('staff.post','LIKE', "%$request->toSearch%")
        ->orWhere('dep.name','LIKE', "%$request->toSearch%")
        ->orWhere('comp.name','LIKE', "%$request->toSearch%")
        ->join('operateur as opet', 'cart_sim.operateur', '=', 'opet.id')
        ->join('personnel as staff', 'cart_sim.staff_id', '=', 'staff.id')
        ->join('department as dep', 'staff.department', '=', 'dep.id')
        ->join('compagny as comp', 'staff.compagny', '=', 'comp.id')
        ->get();

        return response()->json($sim);
    }

     /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function filter(Request $request)
    {
        $sim = CartSim::select(
            'cart_sim.id',
            'operateur as idOperator',
            'opet.name as operateur',
            'line',
            'number_sim',
            'cart_sim.created_at as hiring_date',
             DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
            'staff.id as idStaff',
            'staff.post',
            'dep.name as department',
            'comp.name as compagny',
        )
        ->join('operateur as opet', 'cart_sim.operateur', '=', 'opet.id')
        ->join('personnel as staff', 'cart_sim.staff_id', '=', 'staff.id')
        ->join('department as dep', 'staff.department', '=', 'dep.id')
        ->join('compagny as comp', 'staff.compagny', '=', 'comp.id');

        if(isset($request->operateur)) {
            $sim->where('opet.id', $request->operateur);
        }
        $sim = $sim->get();

        return response()->json($sim);
    }


    /**
     * Update the specified staff.
     * @param Request $request
     * @param id $id
     * @return Response
    */
    public function update(Request $request, $id)
    {
        $cart_sim = CartSim::find($id);

        $cart_sim->update([
            'operateur' => $request->input('operatorId'),
            'line' => $request->input('line'),
            'number_sim' => $request->input('number_sim'),
            'staff_id' => $request->input('staffId'),
        ]);
        return response()->json('CartSim updated');
    }

    /**
     * Delete the specified staff.
     * @param id $id
     * @return Response
    */
    public function destroy($id)
    {
        $cart_sim = CartSim::find($id);
        $cart_sim->delete();
        return response()->json('deleted!');  
    }
}
