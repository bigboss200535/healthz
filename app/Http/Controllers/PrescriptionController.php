<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gender;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    public function add_medicine(Request $request)
    {
        $attendance = DB::table('patient_attendance')
            ->where('archived', 'No')
            ->where('opd_number', $request->opd_number)
            ->orderBy('attendance_id', 'desc')
            ->first();

        if (!$attendance) {
                return response()->json([]);
            }

       // Fetch drugs
        $medicine = Product::where('archived', 'No')
            ->where('status', 'Active')
            ->where(function ($query) use ($attendance) {
                $query->where('age_id', $attendance->age_id)
                    ->orWhere('age_id', '3');
            })
            ->where(function ($query) use ($attendance) {
                $query->where('gender_id', $attendance->gender_id)
                    ->orWhere('gender_id', '1');
            })
            ->where('product_type_id', '1')
            ->where('product_name', 'like', '%' . $request->product_name . '%')
            ->select('product_id', 'product_name', 'prescription_qty', 'store_id', 
                    'nhis_id', 'is_stockable', 'nhis_cover', 'gender_id', 
                    'presentation', 'base_unit')
            ->orderBy('product_name', 'asc')
            ->limit(10)
            ->get();

        return response()->json($medicine);
    }

    public function search_medications(Request $request)
    {
        $opd_number = $request->input('opd_number');
        $patient_id = $request->input('patient_id');
        $prescription_query = $request->input('prescription_query');

        $start = '&'. $prescription_query;
        $contain = '&' . $prescription_query . '&';
        $end = $prescription_query . '&';

        $attendance = DB::table('patient_attendance')
            ->where('archived', 'No')
            ->where('opd_number', $opd_number)
            ->orderBy('attendance_id', 'desc')
            ->first();
            
         // Fetch prescriptions
        $prescriptions = ProductStock::where('product_stocked.archived', 'No')
            ->where('product_stocked.status', 'Active')
            ->join('products', 'product_stocked.product_id', 'products.product_id')
            ->join('product_prices', 'product_prices.product_id', 'product_stocked.product_id')
            ->where(function ($query) use ($attendance) {
                $query->where('products.age_id', $attendance->age_id)
                    ->orWhere('products.age_id', '3');
            })
            ->where(function ($query) use ($attendance) {
                $query->where('products.gender_id', $attendance->gender_id)
                    ->orWhere('products.gender_id', '1');
            })

            ->where('products.product_name', 'like', '%' . $prescription_query . '%')
            ->select('products.product_id', 'products.product_name', 'product_stocked.store_id', 'product_stocked.stock_level', 
                    'product_stocked.expiry_date', 'products.pres_quanity_per_issue_unit','products.age_id', 'products.gender_id', 'product_prices.unit_cost', 
                    'product_prices.cash_price', 'product_prices.cooperate_price', 'product_prices.private_insurance_price', 
                    'product_prices.nhis_amount', 'product_prices.nhis_topup', 'products.presentation')
            ->orderBy('products.product_name', 'asc')
            ->limit(50)
            ->get();

            return response()->json($prescriptions);
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'prescription_opdnumber' => 'required|min:3|max:50',
            'prescription_patient_id' => 'required|min:3|max:50',
            'prescription_product_id' => 'required|min:3',
            'prescription_dosage' => 'nullable',
            'prescription_presentation' => 'required',
            'prescription_frequency' => 'required',
            'prescription_duration' => 'required',
            'prescription_qty' => 'required|min:3|max:50',
            'prescription_price' => 'required',
            'prescription_type' => 'required|min:3|max:50',
            'prescription_start_date' => 'required',
            'prescription_end_date' => 'required|min:3|max:50',
            'prescription_sponsor' => 'required',
            'prescription_gdrg' => 'required|min:3|max:50',
        ]); 

        // $existing_product = Prescription::where('product_name', $request->input('product_name')) ->first();

        // if ($existing_product)
        // {
        //     return 200;
        //  }

        $pres_id = $this->prescription_id($request);         
        $prescription = new Prescription();
        $prescription->prescriptions_id = $pres_id;
        $prescription->attendance_id = $request->input('');
        $prescription->patient_id = $request->input('prescription_patient_id');
        $prescription->opd_number = $request->input('prescription_opdnumber');
        $prescription->attendance_date = $request->input('');
        $prescription->attendance_time = $request->input('');
        $prescription->entry_date = $request->input('');
        $prescription->age_group_id = $request->input('');
        $prescription->episode_id = $request->input('');
        $prescription->unit_price = $request->input('');
        $prescription->presentation = $request->input('prescription_presentation');
        $prescription->product_id = $request->input('prescription_product_id');
        $prescription->prescription_type = $request->input('prescription_type');
        $prescription->sponsor_id = $request->input('prescription_sponsor');
        $prescription->start_date = $request->input('prescription_start_date');
        $prescription->end_date = $request->input('prescription_end_date');
        $prescription->store_id = $request->input('');
        $prescription->dosage = $request->input('prescription_dosage');
        $prescription->unit_measure = $request->input('');
        $prescription->frequencies = $request->input('prescription_frequency');
        $prescription->duration = $request->input('prescription_duration');
        $prescription->quantity_given = $request->input('');
        $prescription->quantity_serve = $request->input('');
        $prescription->gdrg_code = $request->input('prescription_gdrg');
        $prescription->doctor_id = $request->input('');
        $prescription->facility_id = $request->input('');
        $prescription->added_date = now();
        $prescription->user_id = Auth::user()->user_id;
        $prescription->added_by = Auth::user()->fullname;
        $prescription->added_id = Auth::user()->user_id;
        $prescription->save();

        return 201;

    }

     private function prescription_id(Request $request)
    {
        $count_prescription = Prescription::count();
        $count_plus_one = $count_prescription + 1;
        $desired_length = 4;
        $alphabet = 'P';
        $formatted_id = str_pad($count_plus_one, $desired_length, '0', STR_PAD_LEFT);
        $prescription_id = $alphabet.$formatted_id;

        return $prescription_id;
    }

}
