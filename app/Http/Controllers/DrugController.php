<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\DrugEntry;
use App\Models\DrugOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $drugs = Drug::get();
        
        return view('drug.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drug.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|max:255',
        ]);

        $drug = new Drug();
        $drug->name = $request->name;
        $drug->save();

        return redirect('/drug');
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
        $drug = Drug::find($id);
        return view('drug.edit', compact('drug'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'    => 'required|max:255',
        ]);

        $drug = Drug::find($id);
        $drug->name = $request->name;
        $drug->save();

        return redirect('/drug');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drug = Drug::find($id);
        $drug->delete();
        return redirect()->back()->with('success', 'Obat berhasil dihapus.');
    }

    

}
