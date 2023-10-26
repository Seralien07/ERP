<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Materiel;
use App\Models\Category;
class MaterielController extends Controller
{
    /**
     * Display a listing of staff.
     * @return Response
     */
    public function index()
    {
        $materiel = Materiel::select(
                'materiel.id',
                'serial',
                'type',
                'cat.name as category',
                'cat.id as categoryId',
                'model',
                'quantity',
                'date',
                'commente',
                'materiel.created_at as hiring_date'
            )
            ->join('category as cat', 'materiel.category', '=', 'cat.id')
            ->get();

        return response()->json($materiel);
    }

    /**
     * Store a newly created staff.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $materiel = new Materiel([
            'serial' => $request->input('serial'),
            'type' => $request->input('type'),
            'category' => $request->input('category'),
            'model' => $request->input('model'),
            'quantity' => $request->input('quantity'),
            'date' => $request->input('date'),
            'commente' => $request->input('commente'),
        ]);
        $materiel->save();
        return response()->json('Materiel created!');
    }

    /**
     * Display the specified resource.
     * @param id $id
    */
    public function show($id)
    {
        $contact = Materiel::find($id);
        return response()->json($contact);
    }

    /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function find(Request $request)
    {
        $mat = Materiel::select(
            'materiel.id',
            'serial',
            'type',
            'cat.name as category',
            'model',
            'quantity',
            'date',
            'commente',
            'materiel.created_at as hiring_date'
        )
        ->orWhere('serial','LIKE', "%$request->toSearch%")
        ->orWhere('type','LIKE', "%$request->toSearch%")
        ->orWhere('cat.name','LIKE', "%$request->toSearch%")
        ->orWhere('model','LIKE', "%$request->toSearch%")
        ->orWhere('quantity','LIKE', "%$request->toSearch%")
        ->orWhere('date','LIKE', "%$request->toSearch%")
        ->orWhere('commente','LIKE', "%$request->toSearch%")
        ->join('category as cat', 'materiel.category', '=', 'cat.id')
        ->get();

        return response()->json($mat);
    }

    /**
     * Filter staff.
     * @param Request $request
     * @return array
    */
    public function filter(Request $request)
    {
        $mat = Materiel::select(
            'materiel.id',
            'serial',
            'type',
            'cat.name as category',
            'model',
            'quantity',
            'date',
            'commente',
            'materiel.created_at as hiring_date'
        )
        ->join('category as cat', 'materiel.category', '=', 'cat.id');

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
        $materiel = Materiel::find($id);

        $materiel->update([
            'serial' => $request->input('serial'),
            'type' => $request->input('type'),
            'category' => $request->input('category'),
            'model' => $request->input('model'),
            'quantity' => $request->input('quantity'),
            'date' => $request->input('date'),
            'commente' => $request->input('commente'),
        ]);
        return response()->json('Materiel updated');
    }

    /**
     * Delete the specified staff.
     * @param id $id
     * @return Response
    */
    public function destroy($id)
    {
        $materiel = Materiel::find($id);
        $materiel->delete();
        return response()->json('deleted!');  
    }
}
