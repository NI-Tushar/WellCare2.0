<?php

namespace App\Services;

use GuzzleHttp\Client;

class MIMSMSService
{
    protected $apiKey;
    protected $senderId;
    protected $client;

    public function __construct()
    {
        $this->apiKey = config('services.mimsms.api_key');
        $this->senderId = config('services.mimsms.sender_id');
        $this->client = new Client();
    }

    public function sendOtp($phoneNumber, $message)
    {
        $url = "https://api.mimsms.com/api/SmsSending/SMS"; // Confirm this is the correct endpoint
    
        try {
            $response = $this->client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json', // Set the content type to application/json
                ],
                'json' => [
                    'UserName' => $this->senderId, // Replace with correct field if needed
                    'Apikey' => $this->apiKey, // Replace with correct field if needed
                    'MobileNumber' => $phoneNumber,
                    'CampaignId' => null, // Use null without quotes if needed
                    'SenderName' => 'WellCare',
                    'Message' => $message,
                ],
            ]);
    
            // Parse the response
            $result = json_decode($response->getBody(), true);
    
            // Check if the request was successful
            if ($response->getStatusCode() == 200 && isset($result['status']) && $result['status'] == 'success') {
                return $result;
            } else {
                return ['status' => 'error', 'message' => 'Failed to send OTP.'];
            }
        } catch (\Exception $e) {
            // Log the error or handle it accordingly
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
    
    
}
