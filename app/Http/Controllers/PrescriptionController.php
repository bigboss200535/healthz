<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gender;
use App\Models\Product;

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
}
