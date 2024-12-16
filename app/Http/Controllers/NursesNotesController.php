<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NursesNotesController extends Controller
{
    public function index()
    {
        return view('nurses.index');
    }
}
