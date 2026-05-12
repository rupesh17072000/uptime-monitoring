<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Website;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
      $client1 = Client::create([
            'email'=>'rupesh@yopmail.com'
        ]);
         Website::create([
            'client_id' => $client1->id,
            'url' => 'https://google.com'
        ]);

        Website::create([
            'client_id' => $client1->id,
            'url' => 'https://github.com'
        ]);

        $client2 = Client::create([
            'email' => 'kavita@yopmail.com'
        ]);

        Website::create([
            'client_id' => $client2->id,
            'url' => 'https://laravel.com'
        ]);
    }
}
