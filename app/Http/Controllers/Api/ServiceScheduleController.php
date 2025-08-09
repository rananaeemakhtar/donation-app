<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceSchedule;
use Illuminate\Http\Request;

class ServiceScheduleController extends Controller
{
    public function index()
    {
        $service_schedules = ServiceSchedule::all();

        return response()->json([
            'success' => true,
            'service_schedules' => $service_schedules
        ]);
    }
}
