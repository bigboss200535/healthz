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
    // Get the facility data
    $url_data = Facility::where('archived', 'No')
        ->where('status', 'Active')
        ->select('ccc_type', 'nhia_url', 'nhia_key', 'nhia_secret')
        ->first();

    // Early return if no valid facility data is found
    if (!$url_data) {
        return $this->errorResponse('No active facility data found.');
    }

    // Validate the incoming request data
    $validated = $request->validate([
        'card_type' => 'required|string',
        'member_no' => 'required|string',
    ]);

    // Define the full API URL
    $full_url = rtrim($url_data->nhia_url, '/') . '/api/hmis/genCC';

    // Check if the API is reachable before proceeding
    if (!$this->isApiReachable($full_url)) {
        return $this->errorResponse('The API URL is not reachable. Please check the URL or the server.');
    }

    // Prepare form data for the POST request
    $form_data = [
        'CardType' => $validated['card_type'],
        'CardNo'   => $validated['member_no']
    ];

    // Process the API call based on the CCC type
    if ($url_data->ccc_type === 'Automatic') {
        return $this->sendApiRequest('https://elig.nhia.gov.gh:5000/api/hmis/genCC', $form_data, $url_data);
    } elseif ($url_data->ccc_type === 'Manual') {
        return response()->json([
            'success' => false,
            'error'   => 'Enter CCC Manually'
        ]);
    }

    return $this->errorResponse('Invalid CCC type configuration.');
}

private function isApiReachable(string $url): bool
{
    try {
        $response = Http::timeout(10)->get($url);
        return $response->successful();
    } catch (\Exception $e) {
        Log::error('API Check Exception: ' . $e->getMessage());
        return false;
    }
}

private function sendApiRequest(string $url, array $formData, $urlData)
{
    try {
        $response = Http::withHeaders([
            'Content-Type'     => 'application/json',
            'x-nhia-apikey'    => $urlData->nhia_key,
            'x-nhia-apisecret' => $urlData->nhia_secret,
            'Authorization'    => 'Basic ' . base64_encode("{$urlData->nhia_key}:{$urlData->nhia_secret}")
        ])->post($url, $formData);

        // Handle response based on content type
        if ($response->successful()) {
            $contentType = $response->header('Content-Type');
            if (strpos($contentType, 'application/json') !== false) {
                return response()->json([
                    'success' => true,
                    'result'  => $response->json()
                ]);
            } else {
                return $this->errorResponse('Unexpected content type returned by the API.');
            }
        }

        return $this->errorResponse('API returned an error: ' . $response->status(), $response->status());
    } catch (\Exception $e) {
        Log::error('API Call Exception: ' . $e->getMessage());
        return $this->errorResponse('Error during API call: ' . $e->getMessage());
    }
}

private function errorResponse(string $message, int $status = 500)
{
    return response()->json([
        'success' => false,
        'error'   => $message
    ], $status);
}

    
}
