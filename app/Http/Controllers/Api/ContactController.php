<?php

namespace App\Http\Controllers\Api;

use App\Events\ContactEntryCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactEntry;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'message' =>'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $contact = ContactEntry::create($data);
        event(new ContactEntryCreated($contact));

        return response()->json([
           'success' => true,
           'message' => 'Contact message sent successfully.'
        ]);
    }
}
