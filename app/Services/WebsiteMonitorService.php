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
    private function sendDownMail($website){
        Mail::to($website->client->email)->queue(new WebsiteDownMail($website));
    }
    public function check(Website $website){
        try{
            //sends request to website URL and wait max 10 seconds.
            $sendRequesttoWebsite=Http::timeout(10)->get($website->url);
            $isDown=!$sendRequesttoWebsite->successful();
            if($isDown && !$website->is_down){
                $this->sendDownMail($website);
            }
            $website->update([
                'is_down'=>$isDown,
                'status_code'=>$sendRequesttoWebsite->status(),
                'last_checked_at'=>now(),
            ]);
        }catch(Exception $e){
            Log::error($e->getMessage());
            if(!$website->is_down){
                $this->sendDownMail($website);
            }
            $website->update([
                'is_down'=>true,
                'last_checked_at'=>now(),
            ]);
        }
    }
}