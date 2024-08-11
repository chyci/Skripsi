<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\DrugEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrugEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugentry = DrugEntry::with('drug')->paginate(15);
        return view('drugentry.index', compact('drugentry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drug = Drug::get(); 
        return view('drugentry.create', compact('drug'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'drug_id'    => 'required|integer|exists:drugs,id',
            'quantity'   => 'required|integer',
            'entry_date' => 'required',
        ]);

        DB::beginTransaction();
        $drugentry = new DrugEntry();
        $drugentry->drug_id = $request->drug_id;
        $drugentry->quantity = $request->quantity;
        $drugentry->entry_date = $request->entry_date;
        $drugentry->save();

        $drug = Drug::find($request->drug_id);
        $drug->stock = $drug->stock + $validated['quantity'];
        $drug->save();

        DB::commit();

        return redirect('/drugentry');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $drug = Drug::get(); 
        $drugentry = DrugEntry::find($id);
        return view('drugentry.edit', compact('drugentry','drug'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'drug_id'    => 'required|integer|exists:drugs,id',
            'quantity'   => 'required|integer',
            'entry_date' => 'required',
        ]);

        $drugentry = DrugEntry::find($id);
        $drugentry->drug_id = $request->drug_id;
        $drugentry->quantity = $request->quantity;
        $drugentry->entry_date = $request->entry_date;
        $drugentry->save();

        return redirect('/drugentry');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drugentry = DrugEntry::find($id);
        $drugentry->delete();
        return redirect()->back()->with('success', 'Obat masuk berhasil dihapus.');
    }
}
