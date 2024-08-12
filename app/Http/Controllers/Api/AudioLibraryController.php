<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AudioLibrary;

class AudioLibraryController extends Controller
{
    public function index()
    {
        $entries = AudioLibrary::all();

        return response()->json([
            'success' => true,
            'entries' => $entries
        ]);
    }
}
