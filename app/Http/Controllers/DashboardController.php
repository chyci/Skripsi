<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\DrugOut;
use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $patient = Patient::get();
        $visit = Visit::get();
        $drugs = Drug::get();

        $patient->count();
        $visit->count();
        $drugs->count();
        $drugout->count();


        return view('dashboard', compact('drugout', 'drugs', 'patient'));
    }
}
