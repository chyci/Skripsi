<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('patients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|max:255',
            'birth' => 'required',
            'sex'     => 'required',
            'phone'   => 'required',
            'massage' => 'required',
        ]);

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->birth = $request->birth;
        $patient->sex = $request->sex;
        $patient->phone = $request->phone;
        $patient->address = $request->massage;
        $patient->save();

        return redirect('/patient');
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
