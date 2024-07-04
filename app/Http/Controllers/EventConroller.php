<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventConroller extends Controller
{
   public function events() {
    return view("admin.events.event");
   } 
}
