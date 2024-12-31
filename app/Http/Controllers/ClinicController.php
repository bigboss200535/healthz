<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function index()
    {
        $clinic = Clinic::where('archived', 'No')
            ->where('status', '=','Active')
            ->get();

        return view('clinic.index', compact('clinic'));
    }
}
