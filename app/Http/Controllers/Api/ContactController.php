<?php

namespace App\Http\Controllers\Api;

use App\Events\ContactEntryCreated;
use App\Events\WelcomeCardEntryCreated;
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

    public function contactCard(Request $request)
    {
        $request->validate([
            'title'                           =>       'nullable',
            'name'                            =>       'required',
            'address'                         =>       'required',
            'postcode'                        =>       'required',
            'email'                           =>       'nullable',
            'subject'                         =>       'nullable',
            'message'                         =>       'nullable',
            'phone'                           =>       'nullable',
            'invited_by'                      =>       'required',
            'visit_number'                    =>       'nullable',
            'date'                            =>       'nullable',
            'age'                             =>       'required',
            'about_you'                       =>       'nullable',
            'sunday_school'                   =>       'nullable',
            'more_info'                       =>       'nullable',    
        ]);

        $data = [
            'title'                           =>       $request->title,
            'name'                            =>       $request->name,
            'address'                         =>       $request->address,
            'postcode'                        =>       $request->postcode,
            'email'                           =>       $request->email,
           'subject'                         =>       $request->subject,
           'message'                         =>       $request->message,
            'phone'                           =>       $request->phone,
            'invited_by'                      =>       $request->invited_by,
            'visit_number'                    =>       $request->visit_number,
            'date'                            =>       $request->date,
            'age'                             =>       $request->age,
            'about_you'                       =>       $request->about_you,
           'sunday_school'                   =>       $request->sunday_school,
           'more_info'                       =>       $request->more_info,
        ];

        event(new WelcomeCardEntryCreated($data));


        return response()->json([
           'success' => true,
           'message' => 'Welcome card sent successfully.'
        ]);

    }
}
