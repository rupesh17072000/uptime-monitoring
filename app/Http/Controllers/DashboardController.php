<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
     public function index():Response
    {
        $clients=Client::with('websites')->get();
        return Inertia::render('Home',[
            'clients' => $clients
        ]);
    }
}
