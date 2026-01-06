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

    public function list_patient_sponsor(Request $request)
    {
         $sponsor_list = DB::table('patient_sponsorship')
            ->where('patient_sponsorship.archived', 'No')
            ->where('patient_sponsorship.patient_id', $request->patient_id)
            ->join('sponsors', 'patient_sponsorship.sponsor_id', '=', 'sponsors.sponsor_id')
            ->join('patient_info', 'patient_info.patient_id', '=', 'patient_sponsorship.patient_id')
            ->join('sponsor_type', 'sponsor_type.sponsor_type_id', '=', 'sponsors.sponsor_type_id')
            ->select('patient_info.fullname', 'patient_sponsorship.sponsor_type_id','sponsor_type.sponsor_type','patient_sponsorship.member_no', 
                     'patient_sponsorship.sponsor_id', 'sponsors.sponsor_name', 
                    'patient_sponsorship.start_date', 'patient_sponsorship.end_date', 'patient_sponsorship.added_date', 
                    'patient_sponsorship.status as card_status', 'patient_sponsorship.status', 'patient_sponsorship.priority', 
                    'patient_sponsorship.is_active', 'sponsors.sponsor_name', 'sponsor_type.sponsor_type' )
            ->get();

            return view('patient.sponsors', compact('sponsor_list'));
    }
}
