<?php

use App\Mail\ArduinoOfflineNotification;
use App\Models\sensordata;
use App\Models\ArduinoNotification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use AfricasTalking\SDK\AfricasTalking; // ✅ Import SMS SDK

if (!function_exists('arduinoStatus')) {
    function arduinoStatus()
    {
        $user = Auth::user();

        if (!$user || !$user->adreno_no) {
            return 'Unknown';
        }

        // Get latest sensor data for the user's adreno_no
        $latestData = sensordata::where('adreno_no', $user->adreno_no)
            ->latest('updated_at')
            ->first();

        if (!$latestData) {
            return 'Offline';
        }

        $lastUpdated = Carbon::parse($latestData->updated_at);
        $now = Carbon::now();

        // Check if Arduino is offline
        if ($lastUpdated->diffInHours($now) > 5) {
            // Check last notification time
            $lastNotification = ArduinoNotification::where('user_id', $user->id)
                ->latest('notified_at')
                ->first();

            $shouldNotify = !$lastNotification || Carbon::parse($lastNotification->notified_at)->diffInMinutes(now()) > 30;

            if ($shouldNotify) {
                Mail::to($user->email)->send(new ArduinoOfflineNotification($user));

                try {
                    $AT = new AfricasTalking(
                        env('AFRICASTALKING_USERNAME'),
                        env('AFRICASTALKING_API_KEY')
                    );

                    $sms = $AT->sms();
                    $message = "Arduino Offline Alert:\n"
                    . "Hi {$user->name}, your Arduino device (ID: {$user->adreno_no}) hasn't sent data for over 5 hours. "
                    . "Please check its power, network, or connection status.\n- ";

                    $sms->send([
                        'to'      => $user->phone,
                        'message' => $message
                    ]);

                } catch (\Exception $e) {
                    Log::error('SMS sending failed: ' . $e->getMessage());
                }
                ArduinoNotification::create([
                    'user_id' => $user->id,
                    'notified_at' => now(),
                ]);
            }

            return 'Offline';
        } else {
            return 'Online';
        }
    }
}
