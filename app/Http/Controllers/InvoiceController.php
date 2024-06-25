<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return response()->json([
            'invoices'=>$invoices
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
            'totalItems'=>'required',
            'totalAmount'=>'required',
            'date'=>'required|date'
        ]);

        $invoice = Invoice::create($request->all());
        return response()->json([
            'invoice'=>$invoice,
            'message'=>'La facture n.'.$invoice->id.' à été créée'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $invoice = Invoice::find($id);
        return response()->json([
            'invoice'=>$invoice,
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'totalItems'=>'required',
            'totalAmount'=>'required',
            'date'=>'required|date'
        ]);

        $invoice = Invoice::find($id);
        $invoice->update($request->all());
        return response()->json([
            'invoice'=>$invoice,
            'message'=>"La facture n.".$invoice->id." a été modifiée correctement"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return response()->json([
            'message'=>"La facture n.".$invoice->id." a été supprimée correctement"
        ],200);
    }
}
