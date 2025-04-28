<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Relation;
use App\Models\Patient;
use App\Models\PatientSponsor;
use App\Models\Sponsors;
use App\Models\PatNumber;
use App\Models\YearlyCount;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{

    public function get_sponsors_by_type(Request $request)
    {
        // fetch sponsors for patient registration
        $request->validate([
            'sponsor_type_id' => 'required|string|max:10'
        ]);

        $sponsors = Sponsors::where('sponsor_type_id', $request->sponsor_type_id)
                    ->where('archived', 'No')
                    ->get();
    
        
        return response()->json($sponsors);
    }
}
