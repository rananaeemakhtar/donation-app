<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAudioLibraryRequest;
use App\Http\Requests\UpdateAudioLibraryRequest;
use App\Http\Controllers\Controller;
use App\Models\AudioLibrary;


class AudioLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = AudioLibrary::all();

        return view('admin.audio-library.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.audio-library.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAudioLibraryRequest $request)
    {
        
        $data = $request->validated();

        $fileName = time() . '.' . $request->audio->getClientOriginalExtension();
        $path = 'public/library';

        $path = $request->audio->storeAs($path, $fileName);
        $data['audio'] = str_replace('public', 'storage', $path);

        AudioLibrary::create($data);

        return redirect()->route('audio-library.index')->with('success', 'Audio Library entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AudioLibrary $audioLibrary)
    {
        return view('admin.audio-library.show', compact('audioLibrary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AudioLibrary $audioLibrary)
    {
        return view('admin.audio-library.edit', compact('audioLibrary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAudioLibraryRequest $request, AudioLibrary $audioLibrary)
    {
        $data = $request->validated();

        if($request->hasFile('audio')) {                
            $fileName = time() . '.' . $request->audio->getClientOriginalExtension();
            $path = 'public/library';

            $path = $request->audio->storeAs($path, $fileName);
            $data['audio'] = str_replace('public', 'storage', $path);    
        }

        $audioLibrary->update($data);

        return redirect()->route('audio-library.index')->with('success', 'Audio Library entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AudioLibrary $audioLibrary)
    {
        $audioLibrary->delete();

        return redirect()->route('audio-library.index')->with('success', 'Audio Library entry deleted successfully.');
    }
}
