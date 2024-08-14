<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AudioLibrary;

class AudioLibraryController extends Controller
{
    public function index()
    {
        $title = request()->query('title');
        $start_date = request()->query('from_date');
        $end_date = request()->query('to_date');

        $entries = AudioLibrary::where('audio', '!=', '')
        ->when($title, function($q) use ($title) {
            $q->where('title', 'LIKE', "%{$title}%");
        })
        ->when($start_date && $end_date, function($q) use ($start_date, $end_date) {
            $q->whereBetween('date_of_recording', [$start_date, $end_date]);
        })
        ->when($start_date && !$end_date, function($q) use ($start_date) {
            $q->where('date_of_recording', '>=', $start_date);
        })
        ->when(!$start_date && $end_date, function($q) use ($start_date, $end_date) {
            $q->where('date_of_recording', '<=', $end_date);
        })->get();

        return response()->json([
            'success' => true,
            'entries' => $entries
        ]);
    }
}
