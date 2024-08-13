<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\DrugOut;
use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::get();
        return view('patienthistory.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // jangannn
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $patients = Patient::get();
        $drugs = Drug::get();
        // $drugout = DrugOut::get();


        $visit = Visit::where('patient_id', $id)->get();
        $drugouts = DrugOut::where('visit_id', $id)->get();

        return view('patienthistory.show', compact('drugouts', 'drugs', 'patients', 'visit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
