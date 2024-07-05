<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;

class EventConroller extends Controller
{
   public function events(Event  $event) {
        $events = $event->all();
        // dd($events);
    return view("admin.events.event", ["events"=> $events]);
   } 


   public function create_events() {
    return view("admin.events.create");
   }


   public function store_events(StoreEventRequest $request) {
    $validated = $request->validated();

    $event = Event::create([
            'tittle' => $validated['tittle'],
            'date'=> $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'zoom_id' => $validated['zoom_ID'],
            'phone_number' => $validated['phone_no'],
            'website' => $validated['website'],
            'organizer_name' => $validated['organizer_name'],
    ]);

    if($event->save()) {


    return redirect()->route('add.events')->with('success', 'Event created successfully.');
    } 
    
    else {
        return redirect()->back()->with('error','Unabale to create Event');
   }
        }


        public function update_events(Event $event) {
                return view('admin.events.edit', ['update_event'=> $event]);
        }

        public function actual_update_events(Event $event, Request $request) {
            $validator =  $request->validate([
            'tittle' => ['required', 'string'],
            'date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'zoom_ID' => ['required'],
            'phone_no' => ['required'],
            'website' => ['required'],
            'organizer_name' => ['required'], 
            ]);

            $event->update($validator);

                return redirect()->route('add.events');
        }
        
        public function delete_events(Event $event) {

                $event->delete();

                return redirect()->back();

        }


}