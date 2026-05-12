<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Website;
use App\Jobs\CheckWebsiteJob;

class CheckWebsitesCommand extends Command
{
    protected $signature='websites:check';
    protected $description='Check all monitored websites';

    public function handle():void
    {
        Website::chunk(100,function ($websites) {
            foreach ($websites as $website) {
                dispatch(new CheckWebsiteJob($website));
            }
        });
    }
}
