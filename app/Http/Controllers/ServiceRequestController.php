<?php

namespace App\Http\Controllers;

use App\Models\ServiceAttendancetype;
use App\Models\ServicePoints;
use App\Models\SponsorType;
use Illuminate\Http\Request;
use App\Models\User;


class ServiceRequestController extends Controller
{
    
     public function index()
    {
        // // $service_resuest = ;
        //  // $service_request = Relation::with('users')->get();
        // $sponsors = SponsorType::where('archived', 'No')->where('status', '=','Active')->get();
        // return view('service.index', compact('sponsors'));
    }

    public function create(Request $request, $clinic_id)
    {
        $clinic_id = '000';
        $service = ServicePoints::select('service_point_id','service_points','gender_id', 'age_id')
        // ->where('gender_id', $patients->gender_id)
        // ->where('age_id', $ages->age_id)
         ->where('archived', 'No')
         ->where('is_active', 'Yes')
        ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'username' => 'required|string|min:1',
        ]);

         $product = User::create([
            'user_id' => $request->product_name,
            'username' => $request->category_id,
        ]); 
    }

    public function show(Request $request, $clinic_id)
    {
       
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

        
    }

    public function getspecialties(Request $request, $clinic_id)
    {
        $clinic_attendance = ServicePoints::select('service_point_id','service_points','attendance_type_id', 'clinic_id')
         ->where('service_point_id', $clinic_id)
        ->first();

        if (!$clinic_attendance) {
            return response()->json([
                'success' => false,
                'message' => 'Clinic not found',
            ], 404);
        }

        $attendance_services = ServiceAttendancetype::where('attendance_type_id', $clinic_attendance->attendance_type_id)
        ->where('archived', 'No')
        ->get();

        return response()->json([
            'success' => true,
            'result' => $attendance_services
        ]);
        
    }


}
