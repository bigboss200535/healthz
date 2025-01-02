<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Age;
use App\Models\Gender;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function index()
    {
        // // ->lockForUpdate() 
        $diagnosis = Diagnosis::where('archived', 'No')->where('status', '=','Active')
        ->orderBy('diagnosis.diagnosis', 'asc') 
        ->get();
        // ->paginate(20);

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
}
