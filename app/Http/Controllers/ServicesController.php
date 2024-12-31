<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\Age;
use App\Models\Gender;
use Illuminate\Http\Request;
// use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;
use Illuminate\Support\Facades\DB;


class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::where('archived', 'No')
            ->where('status', '=','Active')
            // ->rightjoin('services', 'services.service_id', '=', 'services_fee.service_id')
            // ->orderBy('services_fee.service', 'asc')
            ->get();

        return view('service.index', compact('services'));
    }
}
