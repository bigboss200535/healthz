<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class CodeGenerationController extends Controller
{
    public function index(Request $request)
    {
        $stored_data = DB::table('facility')->where('archived', 'No')->select('ccc_type','nhia_url', 'nhia_key', 'nhia_secret')->first();
        // $apiUrl = Http::get("https://elig.nhia.gov.gh:5000/api/hmis/genCCC");
        // $full_url = "https://elig.nhia.gov.gh:5000/api/hmis/genCCC";
        $end_point = 'api/hmis/genCC';
       //"hp6658"; // API Key
       //"ncgxs3"; // Secret
        $full_url = Http::get($stored_data->nhia_url . $end_point);
        $cardType = $request->input('card_type');
        $cardNo = $request->input('member_no');

        // Prepare the form data
        $formData = [
            'CardType' => $cardType,
            'CardNo' => $cardNo
        ];

        if($stored_data->ccc_type=='Automatic')
        {
        // Send the POST request to the API
                try {
                    $response = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'x-nhia-apikey' => $stored_data->nhia_key,  // API key header
                        'x-nhia-apisecret' =>  $stored_data->nhia_secret, // Secret key header
                        'Authorization' => 'Basic ' . base64_encode("$stored_data->nhia_key: $stored_data->nhia_secret") // Optional, if required
                    ])->post($full_url, $formData);

                    // Check if the response is JSON or plain text
                    if ($response->header('Content-Type') === 'application/json') {
                        $result = $response->json(); 
                        // Parse as JSON
                    } else {
                        $result = $response->body(); 
                        // Otherwise get plain text response
                    }

                    // Return the result to the frontend or view
                    return response()->json([
                        'success' => true,
                        'result' => $result
                    ]);

                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'error' => $e->getMessage()
                    ]);
                }
    }
    else if ($stored_data->ccc_type==='Manual'){
        return response()->json([
            'success' => false,
            'error' =>'CCC Cannot be generated'
        ]);
    }

    }
}
