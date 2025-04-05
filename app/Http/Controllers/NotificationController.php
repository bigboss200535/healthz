<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // date_default_timezone_set("Africa/Accra");
        $sms = Notification::orderBy('added_date', 'desc')->get();
        return view('notifications.index', compact('sms')); 
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'notification' => 'required|string',
            'notification_type' => 'required|string',
            'intended_for' => 'required|string'
        ]);

        Notification::create([
            'notification' => $validated['notification'],
            'notification_type' => $validated['notification_type'],
            'read_status' => 'Unread',
            'intended_for' => $validated['intended_for'],
            'user_id' => Auth::user()->user_id,
            'status' => 'Pending',
            'added_date' => now()
        ]);

        return redirect()->route('notifications.index')
            ->with('success', 'Notification created successfully.');
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')
            ->with('success', 'Notification deleted successfully.');
    }


    // public function send_smss()
    // {

    //     $end_point= 'https://apps.mnotify.net/smsapi?key=vGBPJ43WnQdFcqX3QL9TtVcZz&to=0245340461&msg=SMS APi Texting&sender_id=WebEdgeTek';
    //     $response = file_get_contents($end_point);
    //     return $response;
    // }

    public function send_sms(Request $request)
    {
        
        // Validate the request
        $validated = $request->validate([
            'sms_telephone' => 'required|string|regex:/^0\d{9}$/', // Ghanaian format: 024xxxxxxx
            'sms_message'   => 'required|string|max:160',
        ]);

        // API Configuration
        $api_key     = 'vGBPJ43WnQdFcqX3QL9TtVcZz'; // Replace with your actual mNotify API key
        $sender_id   = 'WebEdgeTek';    // Must be ≤11 chars, no numeric IDs
        $telephone  = $validated['sms_telephone'];
        $message     = urlencode($validated['sms_message']); // URL-encode the message

        // Build the endpoint URL
        $end_point = "https://apps.mnotify.net/smsapi?"
            . "key=$api_key"
            . "&to=$telephone"
            . "&msg=$message"
            . "&sender_id=$sender_id";

        try {
            // Send the SMS
            $response = file_get_contents($end_point);
            if ($response === false) {
                throw new \Exception('Failed to connect to SMS service');
            }

            $response_data = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid response from SMS service');
            }

            // Check if the SMS was successfully sent
            $status = ($response_data['code'] === '1000') ? 'Delivered' : 'Not Delivered';
        } catch (\Exception $e) {
            $status = 'Not Delivered';
            $response_data = ['error' => $e->getMessage()];
        }

            Notification::create([
                'notification' => $validated['sms_message'],
                'notification_type' => 'SMS',
                'read_status' => 'N/A',
                'intended_for' => $validated['sms_telephone'],
                'user_id' => Auth::user()->user_id,
                'status' => $status,
                'added_date' => now(),
            ]);

            if ($status === 'Delivered') {
                return response()->json([
                    'success' => true,
                    'message' => 'SMS sent successfully!',
                    'api_response' => $response_data // Optional: include API response
                ]);
            } else if ($status === 'Not Delivered'){
                return response()->json([
                    'success' => false,
                    'message' => 'SMS failed to send. Response code:',
                    'api_response' => $response_data // Optional: include API response
                ], 400);
            }
 
    }


    public function add_email()
    {
        $sms = Notification::orderBy('added_date', 'desc')->get();
        return view('notifications.index', compact('sms')); 
    }
}
