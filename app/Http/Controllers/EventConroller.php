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

                $fileName = time() . '.' . $request->audio->getClientOriginalExtension();
                $path = 'public/audio.';

                // Store the uploaded audio file (replace with actual S3 logic later)
                $path = $request->audio->storeAs($path, $fileName);
                $validated['audio'] = str_replace('public', 'storage', $path);

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
                        'audio' => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                        'description' => ['required'],
                ]);

                $data = $request->all();

                if($request->hasFile('audio')) {
                
                        $fileName = time() . '.' . $request->audio->getClientOriginalExtension();
                        $path = 'public/audio';
        
                        // Store the uploaded audio file (replace with actual S3 logic later)
                        $path = $request->audio->storeAs($path, $fileName);
                        $data['audio'] = str_replace('public', 'storage', $path);
        
                        
                }

                $event->update($data);

                return redirect()->route('events.index');
        }

        public function delete_events(Event $event)
        {

                $event->delete();

                return redirect()->back();
        }
}
