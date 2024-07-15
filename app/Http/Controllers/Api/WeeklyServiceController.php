<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeeklyService;
use Illuminate\Http\Request;

class WeeklyServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = WeeklyService::all();

        return response()->json([
           'success' => true,
            'services' => $services
        ]);
    }
}
