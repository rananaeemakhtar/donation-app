<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::WhereBetween('date', [now()->startOfMonth(), now()->endOfMonth()]);

        if($request->has('order_by')){
            $events = $events->orderBy($request->order_by, $request->order)->orderBy('start_time', $request->order);
        }
        
        $events = $events->get();

        return response()->json([
            'success' => true,
            'events' => $events
        ]);
    }
}
