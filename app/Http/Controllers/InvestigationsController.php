<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Models\ServicesFee;
use App\Models\PatientAttendance;
use DB;
use Auth;

class InvestigationsController extends Controller
{
    public function index()
    {
        $all = PatientAttendance::where('patient_attendance.archived','No')
                ->join('sponsor_type', 'patient_attendance.sponsor_type_id', '=', 'sponsor_type.sponsor_type_id')
                ->join('patient_info', 'patient_info.patient_id', '=', 'patient_attendance.patient_id')
                ->join('gender', 'gender.gender_id', '=', 'patient_info.gender_id')
                ->join('sponsors', 'patient_attendance.sponsor_id', '=', 'sponsors.sponsor_id')
                ->join('service_attendance_type', 'service_attendance_type.attendance_type_id', '=', 'patient_attendance.service_type')
                ->select('patient_attendance.attendance_id','patient_info.fullname', 'patient_attendance.opd_number', 
                        'patient_attendance.attendance_date', 'sponsors.sponsor_name',
                        'patient_attendance.full_age', 'gender.gender', 'service_attendance_type.attendance_type as pat_clinic', 
                        'sponsor_type.sponsor_type as sponsor', 'sponsor_type.sponsor_type_id',
                        'patient_attendance.service_issued' ,'patient_attendance.attendance_type')
                ->where('patient_attendance.archived', 'No')
                ->orderBy('patient_attendance.attendance_id', 'desc')
                ->get();
            
        return view('investigations.index', compact('all'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
         // Get current attendance details for additional fields
            $attendance = PatientAttendance::where('attendance_id', $request->input('investigation_attendance_id'))
                ->first();
            
            // Get the next service request ID for the service to be saved
            $count = PatientServiceRequest::count();
            $service_request_id = 'SR' . str_pad($count + 1, 6, '0', STR_PAD_LEFT);

        try {
            
            // create the new service(s)
             PatientServiceRequest::create([
                'service_request_id' => $service_request_id,
                'patient_id' => $validated_data['patient_id'],
                'opd_number' => $validated_data['investigation_opdnumber'],
                'attendance_id' => $validated_data['attendance_id'],
                'service_type_id'=> '',
                'service_id' => $validated_data['service_type'],
                'service_fee_id' => $validated_data['service_fee_id'],
                'request_type' => '',
                'sponsor_id' => '',
                'sponsor_type_id' => '',
                'cash_amount' => 0,
                'attendance_date' => $validated_data['service_date'],
                'added_date' => $now,
                'facility_id' => '',
                'age_id' =>  $attendance->age_id,
                'gender_id' =>  $attendance->gender_id,
                'user_id' => Auth::user()->user_id
                ]);
            
            return response()->json(['success' => true, 'message' => 'Investigation saved successfully']);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error saving investigation: ' . $e->getMessage()], 500);
        }
    }

    public function search_investigations(Request $request)
    {
        $attendance_id = $request->input('attendance_id');
        $investigation_query = $request->input('investigation_query');
        $service_id = $request->input('service_id');

        $attendance = PatientAttendance::where('archived', 'No')
            ->where('opd_number', $attendance_id)
            ->orderBy('attendance_id', 'desc')
            ->first();
            
        // Fetch services based on service type and search query
        $query = ServicesFee::where('services_fee.archived', 'No')
            ->where(function ($query) use ($attendance) {
                if ($attendance) {
                    $query->where('services_fee.age_id', $attendance->age_id)
                        ->orWhere('services_fee.age_id', '3');
                }
            })
            ->where(function ($query) use ($attendance) {
                if ($attendance) {
                    $query->where('services_fee.gender_id', $attendance->gender_id)
                        ->orWhere('services_fee.gender_id', '1');
                }
            });
            
        // Filter by service type id if provided
        if ($service_id) {
            $query->where('services_fee.service_id', $service_id);
        }
        
        // Filter by search query
        if ($investigation_query) {
            $query->where('services_fee.service', 'like', '%' . $investigation_query . '%');
        }
        
        $services = $query->select('services_fee.*')
            ->orderBy('services_fee.service', 'asc')
            ->limit(50)
            ->get();

        return response()->json($services);
    }
    
    public function get_services_by_type(Request $request)
    {
        $service_type = $request->input('service_type');
        $opd_number = $request->input('opd_number');
        
        $attendance = PatientAttendance::where('archived', 'No')
            ->where('opd_number', $opd_number)
            ->orderBy('attendance_id', 'desc')
            ->first();
            
        $services = ServicesFee::where('services_fee.archived', 'No')
            ->where('services_fee.service_id', $service_type)
            ->where(function ($query) use ($attendance) {
                if ($attendance) {
                    $query->where('services_fee.age_id', $attendance->age_id)
                        ->orWhere('services_fee.age_id', '3');
                }
            })
            ->where(function ($query) use ($attendance) {
                if ($attendance) {
                    $query->where('services_fee.gender_id', $attendance->gender_id)
                        ->orWhere('services_fee.gender_id', '1');
                }
            })
            ->select('services_fee.*')
            ->orderBy('services_fee.service', 'asc')
            ->get();

        return response()->json($services);
    }

}
