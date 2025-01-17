<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Facility;

class ExternalCallController extends Controller
{

    public function claims_check_code(Request $request)
    {
        $url_data = Facility::where('archived', 'No')
        ->where('status', 'Active')
        ->select('ccc_type', 'nhia_url', 'nhia_key', 'nhia_secret')
        ->first();
    
    // Define the endpoint and prepare the full URL
    $end_point = 'api/hmis/genCC';
    $base_url = rtrim($url_data->nhia_url, '/');
    $full_url = $base_url . '/' . $end_point;

    // Check if the API is reachable
    try {
        $api_check_response = Http::get($full_url);

        if ($api_check_response->successful()) {
            $card_type = $request->input('card_type');
            $card_no = $request->input('member_no');

            // Prepare the form data for the POST request
            $form_data = [
                'CardType' => $card_type,
                'CardNo'   => $card_no
            ];

            if ($url_data->ccc_type == 'Automatic') {
                try {
                    $response = Http::withHeaders([
                        'Content-Type'     => 'application/json',
                        'x-nhia-apikey'    => $url_data->nhia_key,
                        'x-nhia-apisecret' => $url_data->nhia_secret,
                        'Authorization'    => 'Basic ' . base64_encode("{$url_data->nhia_key}:{$url_data->nhia_secret}")
                    ])->post($full_url, $form_data);

                    // Check if the response is successful
                    if ($response->successful()) {
                        return response()->json([
                            'success' => true,
                            'result'  => $response->json()
                        ]);
                    } else {
                        Log::error('API returned an error: ' . $response->status() . ' - ' . $response->body());
                        return response()->json([
                            'success' => false,
                            'error'   => 'API returned an error: ' . $response->status()
                        ]);
                    }

                } catch (\Exception $e) {
                    Log::error('API Call Exception: ' . $e->getMessage());
                    return response()->json([
                        'success' => false,
                        'error'   => 'Error during API call: ' . $e->getMessage()
                    ]);
                }
            } else if ($url_data->ccc_type === 'Manual') {
                return response()->json([
                    'success' => false,
                    'error'   => 'Enter CCC Manually'
                ]);
            }

        } else {
            Log::error('API URL is not reachable: ' . $full_url);
            return response()->json([
                'success' => false,
                'error'   => 'The API URL is not reachable. Please check the URL or the server.'
            ]);
        }

    } catch (\Exception $e) {
        Log::error('API Check Exception: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'error'   => 'Error during API check: ' . $e->getMessage()
        ]);
    }
}
}
