<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Website;
use App\Services\WebsiteMonitorService;

class WebsiteMonitorTest extends TestCase
{
    public function test_website_check()
    {
        Http::fake(['*'=>Http::response([],200)]);
        $website = Website::factory()->create();
        $service = new WebsiteMonitorService();
        $service->check($website);
        $this->assertFalse($website->fresh()->is_down);
    }

    // /**
    //  * A basic feature test example.
    //  */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
