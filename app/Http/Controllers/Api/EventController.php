<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // $events = Event::WhereBetween('date', [now()->startOfMonth(), now()->endOfMonth()]);

        // if($request->has('order_by')){
        //     $events = $events->orderBy($request->order_by, $request->order)->orderBy('start_time', $request->order);
        // }

        // $events = $events->first();
        // dd(now()->toDateString() . '|' . now()->toTimeString());
        $events = Event::where(function ($query) {
            $query->where('date', '>', now()->toDateString()) // Future dates
                ->orWhere(function ($q) {
                    $q->where('date', now()->toDateString()) // Today
                        ->where('start_time', '>', now()->toTimeString()); // Future times
                });
        })
            ->orderBy('date', 'asc')
            ->orderBy('start_time', 'asc')
            ->first();

        return response()->json([
            'success' => true,
            'events' => $events
        ]);
    }

    public function calendar_events(Request $request)
    {
        $events = Event::get();

        return response()->json([
            'success' => true,
            'events' => $events
        ]);
    }
}
