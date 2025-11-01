<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientAttendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NursesNotesController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->input('start_date', date('Y-m-d'));
        $end_date = $request->input('end_date', date('Y-m-d'));

        $base_query = PatientAttendance::query()
                ->where('patient_attendance.archived','No')
                ->join('sponsor_type', 'patient_attendance.sponsor_type_id', '=', 'sponsor_type.sponsor_type_id')
                ->join('patient_info', 'patient_info.patient_id', '=', 'patient_attendance.patient_id')
                ->join('gender', 'gender.gender_id', '=', 'patient_info.gender_id')
                ->join('consultation_issue_status', 'consultation_issue_status.issue_id', '=', 'patient_attendance.issue_id' )
                ->join('sponsors', 'patient_attendance.sponsor_id', '=', 'sponsors.sponsor_id')
                ->join('service_attendance_type', 'service_attendance_type.attendance_type_id', '=', 'patient_attendance.attendance_type_id')
                ->select(
                        'patient_attendance.attendance_id',
                         DB::raw('upper(patient_info.fullname) as fullname'),
                        'patient_info.gender_id', 
                        'patient_attendance.opd_number', 
                        'patient_attendance.attendance_date', 
                        'patient_attendance.status', 
                        'sponsors.sponsor_name', 'patient_attendance.pat_age',
                        'patient_attendance.full_age', 'gender.gender', 'service_attendance_type.attendance_type as clinic', 
                        // 'sponsor_type.sponsor_type as sponsor', 
                        'sponsor_type.sponsor_type_id as sponsor_type_id',
                        'sponsor_type.sponsor_type as sponsor_type',
                        'consultation_issue_status.issue_id',
                        'consultation_issue_status.issue_value', 
                        'consultation_issue_status.color_code',
                        'patient_attendance.issue_id' ,'patient_attendance.attendance_type')
                ->orderByDesc('patient_attendance.attendance_id');
                
            $pending   = (clone $base_query)->where('patient_attendance.issue_id', 0)->get();
            $waiting   = (clone $base_query)->where('patient_attendance.issue_id', 2)->get();
            $completed = (clone $base_query)->where('patient_attendance.issue_id', 3)->get();
            $on_hold   = (clone $base_query)->where('patient_attendance.issue_id', 4)->get();
        

        return view('nurses.index', compact('waiting', 'pending', 'on_hold', 'completed'));
    }

    public function general_vitals(Request $request)
    {
        $start_date = $request->input('start_date', date('Y-m-d'));
        $end_date = $request->input('end_date', date('Y-m-d'));

        $base_query = PatientAttendance::query()
                ->where('patient_attendance.archived','No')
                ->join('sponsor_type', 'patient_attendance.sponsor_type_id', '=', 'sponsor_type.sponsor_type_id')
                ->join('patient_info', 'patient_info.patient_id', '=', 'patient_attendance.patient_id')
                ->join('gender', 'gender.gender_id', '=', 'patient_info.gender_id')
                ->join('consultation_issue_status', 'consultation_issue_status.issue_id', '=', 'patient_attendance.issue_id' )
                ->join('sponsors', 'patient_attendance.sponsor_id', '=', 'sponsors.sponsor_id')
                ->join('service_attendance_type', 'service_attendance_type.attendance_type_id', '=', 'patient_attendance.attendance_type_id')
                ->select(
                        'patient_attendance.attendance_id',
                         DB::raw('upper(patient_info.fullname) as fullname'),
                        'patient_info.gender_id', 
                        'patient_attendance.opd_number', 
                        'patient_attendance.patient_id', 
                        'patient_attendance.attendance_date', 
                        'patient_attendance.status', 
                        'sponsors.sponsor_name', 'patient_attendance.pat_age',
                        'patient_attendance.full_age', 'gender.gender', 'service_attendance_type.attendance_type as clinic', 
                        // 'sponsor_type.sponsor_type as sponsor', 
                        'sponsor_type.sponsor_type_id as sponsor_type_id',
                        'sponsor_type.sponsor_type as sponsor_type',
                        'consultation_issue_status.issue_id',
                        'consultation_issue_status.issue_value', 
                        'consultation_issue_status.color_code',
                        'patient_attendance.issue_id' ,'patient_attendance.attendance_type')
                ->orderByDesc('patient_attendance.attendance_id');
                
            $pending   = (clone $base_query)->where('patient_attendance.issue_id', 0)->get();
            $waiting   = (clone $base_query)->where('patient_attendance.issue_id', 2)->get();
            $completed = (clone $base_query)->where('patient_attendance.issue_id', 3)->get();
            $on_hold   = (clone $base_query)->where('patient_attendance.issue_id', 4)->get();
        
        return view('nurses.vitals', compact('waiting', 'pending', 'on_hold', 'completed'));
    }

    public function store_vitals(Request $request)
    {
        $attendance = PatientAttendance::where('attendance_id', $request->attendance_id)->first();

        // Validate the request data
        $request->validate([
            'patient_id' => 'required',
            'opd_number' => 'required',
            'attendance_id' => 'required',
            'temperature' => 'nullable',
            'weight' => 'nullable|numeric',
            'respiratory' => 'nullable',
            'pulse' => 'nullable',
            'height' => 'nullable|numeric',
            'bmi' => 'nullable|numeric',
            'fbs' => 'nullable',
            'rdt' => 'nullable',
            'rbs' => 'nullable',
            'oxygen_saturation' => 'nullable',
            'systolic' => 'nullable|numeric',
            'dystolic' => 'nullable|numeric',
            'remarks_note' => 'nullable|string',
            'service_date' => 'nullable|date',
        ]);

        try {
            // Generate a unique vital ID
            $vital_id = 'VIT' . time() . rand(1000, 9999);
            
            // Create a new vital record
            DB::table('patient_vitals')->insert([
                'vital_id' => $vital_id,
                'patient_id' => $request->patient_id,
                'opd_number' => $request->opd_number,
                'pat_age' => $attendance->pat_age,
                'temperature' => $request->temperature,
                'height' => $request->height,
                'weight' => $request->weight,
                'diastolic' => $request->dystolic,
                'systolic' => $request->systolic,
                'pulse_rate' => $request->pulse,
                'respiratory_rate' => $request->respiratory,
                'oxygen_saturation' => $request->oxygen_saturation,
                'remarks' => $request->remarks_note,
                'fbs' => $request->fbs,
                'rbs' => $request->rbs,
                'rdt' => $request->rdt,
                'bmi' => $request->bmi,
                'request_date' => $request->service_date,
                'request_time' => now(),
                'facility_id' => Auth::user()->facility_id ?? '',
                'user_id' => Auth::user()->user_id ?? '',
                'added_id' => Auth::user()->user_id ?? '',
                'added_by' => Auth::user()->user_fullname ?? '',
                'added_date' => now()->format('Y-m-d'),
                'status' => 'Active',
                'archived' => 'No',
            ]);

            // Update the patient attendance status to indicate vitals have been taken
            DB::table('patient_attendance')
                ->where('attendance_id', $request->attendance_id)
                ->update([
                    'vital_added' => 1, // Assuming 1 is the ID for "Vitals Taken" status
                    // 'updated_by' => Auth::user()->user_fullname ?? '',
                    // 'updated_date' => now()->format('Y-m-d'),
                ]);

            return response()->json([
                'success' => true,
                'message' => 'Vital signs saved successfully',
                'vital_id' => $vital_id
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving vital signs: ' . $e->getMessage()
            ], 500);
        }
    }
    public function delete_vitals()
    {
        
    }
}
