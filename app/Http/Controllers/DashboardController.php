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
        $avl_drugs = Drug::where('stock', '>', 0)->get();
        $recent_visit = Visit::orderBy('date', 'desc')->take(5)->get();
        $recent_patient = Patient::orderBy('created_at', 'desc')->take(3)->get();

        $patient->count();
        $visit->count();
        $drugs->count();
        $avl_drugs->count();
            
        return view('dashboard', compact('patient', 'visit', 'drugs', 'avl_drugs', 'recent_visit', 'recent_patient'));
    }
}
