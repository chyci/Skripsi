<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\DrugOut;
use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visit = Visit::with('patient')->paginate(15);
        return view('visit.index', compact('visit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patient = Patient::get();
        $drugs = Drug::get();
        $drugout = DrugOut::get();
        return view('visit.create', compact('drugout', 'patient', 'drugs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id'    => 'required|exists:patients,id',
            'blood_pressure' => 'required',
            'fasting_glucose' => 'required',
            'uric_acid' => 'required',
            'diagnose' => 'required',
            'date' => 'required',
        ]);

        $visit = new Visit();
        $visit->patient_id = $request->patient_id;
        $visit->blood_pressure = $request->blood_pressure;
        $visit->uric_acid = $request->uric_acid;
        $visit->fasting_glucose = $request->fasting_glucose;
        $visit->diagnose = $request->diagnose;
        $visit->date = $request->date;
        $visit->save();

        foreach ($request->drug_id as $index => $drug) {
            $drugout = new DrugOut();
            $drugout->drug_id = $drug;
            $drugout->visit_id = $visit->id;
            $drugout->quantity = $request->quantity[$index];
            $drugout->save();
        }

        return redirect('/visit');
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
