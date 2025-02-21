<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;

class MinistriesController extends Controller
{
    public function index()
    {
        $ministries = Ministry::select('id', 'title', 'url')->get();

        return response()->json([
            'success' => true,
            'ministries' => $ministries
        ]);
    }

    public function ministries_by_url($url)
    {
        $ministries = Ministry::with('ministry_testimonial')->where('url',$url)->first();

        // dd($ministries);
        return response()->json([
            'success' => true,
            'ministries' => $ministries
        ]);
    }
}
