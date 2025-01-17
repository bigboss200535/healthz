<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HardwareController extends Controller
{
    public function analyzer_connector()
    {
        // Device connection details
        $ip = '192.168.8.8';    // Device IP address
        $port = 553;            // Device port number
        $timeout = 10;          // Timeout duration in seconds

        // Create a TCP/IP socket
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            Log::error("Socket creation failed: " . socket_strerror(socket_last_error()));
            return response()->json(['error' => 'Socket creation failed'], 500);
        }

        // Set socket timeout
        socket_set_option($socket, SOL_SOCKET, SO_RCVBUF, 1024); // Adjust buffer size if needed
        socket_set_option($socket, SOL_SOCKET, SO_RCVBUF, $timeout);

        // Attempt to connect to the device
        $result = socket_connect($socket, $ip, $port);
        if ($result === false) {
            Log::error("Connection failed: " . socket_strerror(socket_last_error($socket)));
            return response()->json(['error' => 'Connection failed'], 500);
        }

        // Send a request to the device (replace with actual command)
        $request = "GET_DATA_REQUEST";  // Replace with actual request command from device
        socket_write($socket, $request, strlen($request));

        // Read the response from the device
        $response = '';
        while ($out = socket_read($socket, 2048)) {
            $response .= $out;
        }

        // Check if we received a response
        if ($response) {
            // Log the raw response for debugging purposes
            Log::info("Response received from analyzer: " . $response);

            // You can further process the response here (e.g., parse the data as needed)
            // For example, if the response is JSON:
            // $data = json_decode($response, true);

            return response()->json([
                'status' => 'success',
                'data' => $response, // Send back the raw data or parsed data
            ]);
        } else {
            Log::error("No response received or timeout occurred.");
            return response()->json(['error' => 'No data received or timeout occurred'], 500);
        }

        // Close the socket connection
        socket_close($socket);
    }
}
