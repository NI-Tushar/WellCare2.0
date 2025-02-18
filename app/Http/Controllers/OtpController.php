<?php

namespace App\Http\Controllers;
use App\Services\MIMSMSService;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    protected $mimsmsService;

    public function __construct(MIMSMSService $mimsmsService)
    {
        $this->mimsmsService = $mimsmsService;
    }
    public function sendOtp()
    {
        // Debug statement for tracing execution (optional)
        // Log::info('sendOtp method called in OtpController');
        
        $phoneNumber = '8801777608508';
        $otp = rand(1000, 9999); // Generate a random 4-digit OTP
        $message = "Your OTP code is: $otp";
    
        // Send OTP using MIMSMSService
        $response = $this->mimsmsService->sendOtp($phoneNumber, $message);
    
        // Check if the response was successful
        if (isset($response['status']) && $response['status'] == 'success') {
            // Store OTP in the session or database if needed
            // session(['otp' => $otp]);
    
            return response()->json(['message' => 'OTP sent successfully.']);
        } else {
            // Log the error for debugging
            // Log::error('Failed to send OTP', ['response' => $response]);
    
            return response()->json(['error' => 'Failed to send OTP.'], 500);
        }
    }
    
}
