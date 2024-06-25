<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::all();
        return response()->json([
            'adresses'=>$addresses,
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|required',
            'zip'=>'integer|required',
            'city'=>'string|required'
        ]);

        $address = Address::create($request->all());
        return response()->json([
            'address'=>$address,
            'message'=>"L'adresse " . $address->name ." , " . $address->city ." , " . $address->zip ." à été ajoutée" 
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $address = Address::find($id);
        return response()->json([
            'address' => $address
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'zip'=>'required',
            'city'=>'required',
        ]);

        $address = Address::find($id);
        $address->update($request->all());
        return response()->json([
            'address'=>$address,
            'message'=>"L'adresse a été modifiée correctement"
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $address = Address::find($id);
        $address->delete();
        return response()->json([
            'message'=> "L'adresse " . $address->name ." , " . $address->city ." , " . $address->zip ." à été supprimée"
        ],200);
    }
}
