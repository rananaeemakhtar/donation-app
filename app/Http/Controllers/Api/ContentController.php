<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index()
    {
        $content = Content::all();

        return response()->json([
            'success' => true,
            'content' => $content
        ]);
    }
}
