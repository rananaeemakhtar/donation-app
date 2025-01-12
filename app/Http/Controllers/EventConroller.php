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

                if($request->hasFile('audio')) {
                    $fileName = time() . '.' . $request->audio->getClientOriginalExtension();

                    $validated['audio'] = $request->audio->storeAs('events/audio', $fileName, 'public');
                }

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
                        'zoom_link' => ['required'],
                        'phone_no' => ['required'],
                        'website' => ['required'],
                        'organizer_name' => ['required'],
                        'audio' => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                        'description' => ['required'],
                ]);

                $data = $request->all();

                if($request->hasFile('audio')) {
                    $fileName = time() . '.' . $request->audio->getClientOriginalExtension();

                    $data['audio'] = $request->audio->storeAs('events/audio', $fileName, 'public');
                }

                $event->update($data);

                return redirect()->route('events.index');
        }

        public function delete(Event $event)
        {
                $event->delete();

                return redirect()->back();
        }
}
