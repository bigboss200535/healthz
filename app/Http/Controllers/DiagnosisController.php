<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
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

        return view('diagnosis.index', compact('diagnosis'));
    
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
