<?php

namespace App\Services;
use Exception;
use App\Models\Website;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\WebsiteDownMail;

class WebsiteMonitorService
{
    public function check(Website $website): void
    {
        try{
            $response=Http::timeout(10)->get($website->url);
            $isDown=!$response->successful();

            if ($isDown && !$website->is_down) {
                Mail::to($website->client->email)
                    ->queue(new WebsiteDownMail($website));
            }
            $website->update([
                'is_down'=>$isDown,
                'status_code'=>$response->status(),
                'last_checked_at'=>now(),
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            if (!$website->is_down) {
                Mail::to($website->client->email)
                    ->queue(new WebsiteDownMail($website));
            }
            $website->update([
                'is_down'=>true,
                'last_checked_at'=>now(),
            ]);
        }
    }
}