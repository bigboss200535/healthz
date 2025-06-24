<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Facility;
use App\Models\Episode;

class ExternalCallController extends Controller
{
    /**
     * Check claims code by making an API request.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    
    public function index()
    {

    }

    public function store(Request $request)
    {
       
    }


    public function request_ccc(Request $request)
   {
    
    }
    
    public function claims_check_code(Request $request)
    {
        

    }

    
    private function isApiReachable(string $url): bool
    {
        
    }

    
    private function sendApiRequest(string $url, array $formData, $facility)
    {
        
    }

    
    private function errorResponse(string $message, int $status = 500)
    {
       
    }

    public function validateMemberAndGenerateCCC(Request $request)
    {
        // Validate request parameters
        $validated = $request->validate([
            'CardType' => 'required|in:GHANACARD,NHISCARD',
            'CardNo' => 'required|string|max:255',
            // 'facility_id' => 'required|string|exists:facility,facility_id'
        ]);

        // Get facility configuration
        $facility = Facility::where('ccc_type', 'Automatic')
            // where('facility_id', $validated['facility_id'])
            ->where('status', 'Active')
            ->first();

        // Verify API configuration
        if (empty($facility->nhia_url) || empty($facility->nhia_key) || empty($facility->nhia_secret)) {
            return response()->json([
                'success' => false,
                'error' => 'Facility API configuration incomplete',
                'status_code' => 400
            ], 400);
        }

        // Prepare API request
        $endpoint = rtrim($facility->nhia_url, '/') . '/api/hmis/genCCC';

        try {
            $response = Http::withHeaders([
                'x-nhia-apikey' => $facility->nhia_key,
                'x-nhia-apisecret' => $facility->nhia_secret,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post($endpoint, [
                'CardType' => $validated['CardType'],
                'CardNo' => $validated['CardNo'],
            ]);

            // Handle successful response
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'data' => $response->json(),
                    // 'facility' => $facility->facility_name
                ]);
            }

            // Handle API errors
            return response()->json([
                'success' => false,
                'error' => $response->json()['message'] ?? 'API request failed',
                'status_code' => $response->status()
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Network error: ' . $e->getMessage(),
                'status_code' => 500
            ], 500);
        }
    }
}