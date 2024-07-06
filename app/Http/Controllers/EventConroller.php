<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;

class EventConroller extends Controller
{
        public function index(Event  $event)
        {
                $events = $event->paginate(10);

                return view("admin.events.index", ["events" => $events]);
        }


        public function create()
        {
                return view("admin.events.create");
        }


        public function store(StoreEventRequest $request)
        {
                $validated = $request->validated();

                $event = Event::create($validated);

                if ($event->save()) {
                        return redirect()->route('events.index')->with('success', 'Event created successfully.');
                } else {
                        return redirect()->back()->with('error', 'Unabale to create Event');
                }
        }


        public function edit(Event $event)
        {
                return view('admin.events.edit', ['event' => $event]);
        }

        public function update(Event $event, Request $request)
        {
                $request->validate([
                        'title' => ['required', 'string'],
                        'date' => ['required', 'date'],
                        'start_time' => ['required'],
                        'end_time' => ['required'],
                        'zoom_ID' => ['required'],
                        'phone_no' => ['required'],
                        'website' => ['required'],
                        'organizer_name' => ['required'],
                ]);

                $event->update($request->validated());

                return redirect()->route('events.index');
        }

        public function delete_events(Event $event)
        {

                $event->delete();

                return redirect()->back();
        }
}
