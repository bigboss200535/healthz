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
            ->select('patient_info.patient_id','patient_info.fullname', 'patient_sponsorship.sponsor_type_id','sponsor_type.sponsor_type','patient_sponsorship.member_no', 
                    'patient_sponsorship.patient_sponsor_id','patient_sponsorship.sponsor_id', 'sponsors.sponsor_name', 
                    'patient_sponsorship.start_date', 'patient_sponsorship.end_date', 'patient_sponsorship.added_date', 
                    'patient_sponsorship.status as card_status', 'patient_sponsorship.status', 'patient_sponsorship.priority', 
                    'patient_sponsorship.is_active', 'sponsors.sponsor_name', 'sponsor_type.sponsor_type' )
            ->get();
        
        $patient = Patient::where('patient_id', $request->patient_id)
            ->select('patient_id')
            ->first();

            return view('patient.sponsors', compact('sponsor_list', 'patient'));
    }

    public function delete_sponsor($patient_sponsor_id)
    {
        // try {
            $sponsor = PatientSponsor::findOrFail($patient_sponsor_id);
            $sponsor->archived = 'Yes';
            $sponsor->archived_date = now();
            $sponsor->archived_by = auth()->user()->user_fullname;
            $sponsor->save();
            
            return response()->json(['message' => 'Sponsor deleted successfully'], 200);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Failed to delete sponsor: ' . $e->getMessage()], 500);
        // }
    }

    public function update_sponsor(Request $request)
    {
            $validated = $request->validate([
                'patient_id' => 'required|string|max:255',
                'sponsor_type_id' => 'required|string|max:255',
                'sponsor_id' => 'required|string|max:255',
                'member_no' => 'nullable|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'card_status' => 'required|string|in:Active,Inactive',
                'priority' => 'required|string|in:1,2,3,4,5,6,7,8',
                'dependant' => 'nullable|string|in:Yes,No',
            ]);

            $mode = $request->input('form_mode', 'add');
            $patient_id = $validated['patient_id'];
            $sponsor_id = $request->input('sponsor_id');

            // Get patient OPD number
            $patient = Patient::where('patient_id', $patient_id)->first();
            if (!$patient) {
                return response()->json(['error' => 'Patient not found'], 404);
            }

            $sponsorData = [
                
                'patient_id' => $patient_id,
                'opd_number' => $patient->opd_number,
                'sponsor_type_id' => $validated['sponsor_type_id'],
                'sponsor_id' => $validated['sponsor_id'],
                'member_no' => $validated['member_no'] ?? null,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'status' => $validated['card_status'],
                'priority' => $validated['priority'],
                'dependant' => $validated['dependant'] ?? 'NO',
                'is_active' => $validated['card_status'] === 'Active' ? 'Yes' : 'No',
            ];

            if ($mode === 'edit' && $sponsor_id) {
                // Update existing sponsor
                $sponsor = PatientSponsor::findOrFail($sponsor_id);
                $sponsor->update($sponsorData);
                $message = 'Sponsor updated successfully';
            } else {
                // Create new sponsor
                $sponsor = PatientSponsor::create($sponsorData);
                $message = 'Sponsor added successfully';
            }

            return response()->json([
                'message' => $message,
                'sponsor' => $sponsor
            ], 200);

    }
}
