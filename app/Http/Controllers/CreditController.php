<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Credit;
use App\Models\Device;
use App\Models\Voice;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class CreditController extends Controller
{
    /**
     * Display a listing of staff.
     * @return Response
     */
    public function index()
    {
        $credit = Credit::select(
                'credit.id',
                'device as idDevice',
                'dev.name as device',
                'data',
                'price_data',
                'voice as idVoice',
                'voi.name as voice',
                'price_voice',
                'offer as idOffer',
                'off.name as offer',
                'price_offer',
                'option',
                'price_option',
                'comment',
                'credit.created_at as hiring_date',
                DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
                'staff.id as idStaff',
                'staff.post',
                'dep.name as department',
                'comp.name as compagny', 
                'sim.id as idSim',
                'sim.line',
                'opet.name as operateur',
            )
            ->join('device as dev', 'credit.device', '=', 'dev.id')
            ->join('voice as voi', 'credit.voice', '=', 'voi.id')
            ->join('offer as off', 'credit.offer', '=', 'off.id')
            ->join('personnel as staff', 'credit.staff_id', '=', 'staff.id')
            ->join('department as dep', 'staff.department', '=', 'dep.id')
            ->join('compagny as comp', 'staff.compagny', '=', 'comp.id')
            ->join('cart_sim as sim', 'credit.sim_id', '=', 'sim.id')
            ->join('operateur as opet', 'sim.operateur', '=', 'opet.id')
            ->get();

        return response()->json($credit);
    }

    /**
     * Store a newly created staff.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $credit = new Credit([
            
            'device' => $request->input('device'),
            'data' => $request->input('data'),
            'price_data' => $request->input('price_data'),
            'voice' => $request->input('voice'),
            'price_voice' => $request->input('price_voice'),
            'offer' => $request->input('offer'),
            'price_offer' => $request->input('price_offer'),
            'option' => $request->input('option'),
            'price_option' => $request->input('price_option'),
            'comment' => $request->input('comment'),
            'staff_id' => $request->input('staffId'), 
            'sim_id' => $request->input('simId'),   
        ]);
        $credit->save();
        return response()->json('Credit created!');
    }

    /**
     * Display the specified resource.
     * @param id $id
    */
    public function show($id)
    {
        $contact = Credit::find($id);
        return response()->json($contact);
    }

    /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function find(Request $request)
    {
        $cred = Credit::select(
            'credit.id',
            'device as idDevice',
            'dev.name as device',
            'data',
            'price_data',
            'voice as idVoice',
            'voi.name as voice',
            'price_voice',
            'offer as idOffer',
            'off.name as offer',
            'price_offer',
            'option',
            'price_option',
            'comment',
            'credit.created_at as hiring_date',
            DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
            'staff.id as idStaff',
            'staff.post',
            'dep.name as department',
            'comp.name as compagny',
            'sim.id as idSim',
            'sim.line',
            'opet.name as operateur',  
        )
        ->orWhere('dev.name','LIKE', "%$request->toSearch%")
        ->orwhere('data','LIKE', "%$request->toSearch%")
        ->orWhere('price_data','LIKE', "%$request->toSearch%")
        ->orWhere('voi.name','LIKE', "%$request->toSearch%")
        ->orWhere('price_voice','LIKE', "%$request->toSearch%")
        ->orWhere('off.name','LIKE', "%$request->toSearch%")
        ->orwhere('price_offer','LIKE', "%$request->toSearch%")
        ->orWhere('option','LIKE', "%$request->toSearch%")
        ->orWhere('price_option','LIKE', "%$request->toSearch%")
        ->orWhere('comment','LIKE', "%$request->toSearch%")
        ->orWhere('staff.lastname','LIKE', "%$request->toSearch%")
        ->orWhere('staff.firstname','LIKE', "%$request->toSearch%")
        ->orWhere('staff.post','LIKE', "%$request->toSearch%")
        ->orWhere('dep.name','LIKE', "%$request->toSearch%")
        ->orWhere('comp.name','LIKE', "%$request->toSearch%")
        ->orWhere('sim.line','LIKE', "%$request->toSearch%")
        ->orWhere('opet.name','LIKE', "%$request->toSearch%")
        ->join('device as dev', 'credit.device', '=', 'dev.id')
        ->join('voice as voi', 'credit.voice', '=', 'voi.id')
        ->join('offer as off', 'credit.offer', '=', 'off.id')
        ->join('personnel as staff', 'credit.staff_id', '=', 'staff.id')
        ->join('department as dep', 'staff.department', '=', 'dep.id')
        ->join('compagny as comp', 'staff.compagny', '=', 'comp.id')
        ->join('cart_sim as sim', 'credit.sim_id', '=', 'sim.id')
        ->join('operateur as opet', 'sim.operateur', '=', 'opet.id')
        ->get();

        return response()->json($cred);
    }

      /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function filter(Request $request)
    {
        $cred = Credit::select(
            'credit.id',
            'device as idDevice',
            'dev.name as device',
            'data',
            'price_data',
            'voice as idVoice',
            'voi.name as voice',
            'price_voice',
            'offer as idOffer',
            'off.name as offer',
            'price_offer',
            'option',
            'price_option',
            'comment',
            'credit.created_at as hiring_date',
            DB::raw('CONCAT(staff.lastname," ",staff.firstname) AS fullname'),
            'staff.id as idStaff',
            'staff.post',
            'dep.name as department',
            'comp.name as compagny',
            'sim.id as idSim',
            'sim.line',
            'opet.name as operateur',  
        )
        ->join('device as dev', 'credit.device', '=', 'dev.id')
        ->join('voice as voi', 'credit.voice', '=', 'voi.id')
        ->join('offer as off', 'credit.offer', '=', 'off.id')
        ->join('personnel as staff', 'credit.staff_id', '=', 'staff.id')
        ->join('department as dep', 'staff.department', '=', 'dep.id')
        ->join('compagny as comp', 'staff.compagny', '=', 'comp.id')
        ->join('cart_sim as sim', 'credit.sim_id', '=', 'sim.id')
        ->join('operateur as opet', 'sim.operateur', '=', 'opet.id');

        if(isset($request->offer)) {
            $cred->where('off.id', $request->offer);
        }
        if(isset($request->device)) {
            $cred->where('dev.id', $request->device);
        }
        if(isset($request->voice)) {
            $cred->where('voi.id', $request->voice);
        }
       
        $cred = $cred->get();

        return response()->json($cred);
    }


    /**
     * Update the specified staff.
     * @param Request $request
     * @param id $id
     * @return Response
    */
    public function update(Request $request, $id)
    {
        $credit = Credit::find($id);

        $credit->update([
            'device' => $request->input('deviceId'),
            'data' => $request->input('data'),
            'price_data' => $request->input('price_data'),
            'voice' => $request->input('voiceId'),
            'price_voice' => $request->input('price_voice'),
            'offer' => $request->input('offerId'),
            'price_offer' => $request->input('price_offer'),
            'option' => $request->input('option'),
            'price_option' => $request->input('price_option'),
            'comment' => $request->input('comment'), 
            'staff_id' => $request->input('staffId'),
            'sim_id' => $request->input('simId'), 
        ]);
        return response()->json('Credit updated');
    }

    /**
     * Delete the specified staff.
     * @param id $id
     * @return Response
    */
    public function destroy($id)
    {
        $credit = Credit::find($id);
        $credit->delete();
        return response()->json('deleted!');  
    }
}
