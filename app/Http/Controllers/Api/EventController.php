<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::WhereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])->get();

        return response()->json([
            'success' => true,
            'events' => $events
        ]);
    }
}
