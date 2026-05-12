<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Website;
use App\Services\WebsiteMonitorService;

class CheckWebsiteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public Website $website;

     public function __construct(Website $website)
    {
        $this->website=$website;
    }
    public function handle(WebsiteMonitorService $service):void
    {
        $service->check($this->website);
    }

}
