<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Age;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosisController extends Controller
{
    public function index()
    {
       
        $diagnosis = Diagnosis::where('archived', 'No')->where('status', '=','Active')
        ->orderBy('diagnosis.diagnosis', 'asc') 
        ->get();
        // ->paginate(20);
         // // ->lockForUpdate() 

        $age = Age::where('archived', 'No')
            ->where('status', 'Active')
            // ->orderBy('age_description', 'asc')
            ->get();

        $gender = Gender::where('archived', 'No')
            ->where('status', 'Active')
            ->get();

        return view('diagnosis.index', compact('diagnosis', 'age' , 'gender'));
    
    }


    public function create()
    {

    }

    public function edit()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function destroy()
    {

    }

    public function add_diagnosis(Request $request)
    {
        $attendance = DB::table('patient_attendance')
            ->where('archived', 'No')
            ->where('opd_number', $request->opd_number)
            ->orderBy('attendance_id', 'desc')
            ->first();

        if (!$attendance) {
                return response()->json([]);
            }

       // Fetch diagnoses
        $diagnosis = Diagnosis::where('archived', 'No')
            ->where('status', 'Active')
            ->where(function ($query) use ($attendance) {
                $query->where('age_id', $attendance->age_id)
                    ->orWhere('age_id', '3');
            })
            ->where(function ($query) use ($attendance) {
                $query->where('gender_id', $attendance->gender_id)
                    ->orWhere('gender_id', '1');
            })
            ->where('diagnosis', 'like', '%' . $request->diagnosis . '%')
            ->select('diagnosis', 'diagnosis_code', 'icd_10', 'gdrg_code', 'age_id', 'gender_id', 'adult_tarif', 'child_tarif', 'gdrg_adult', 'gdrg_child')
            ->orderBy('diagnosis', 'asc')
            ->limit(10)
            ->get();

        return response()->json($diagnosis);
    }
}
