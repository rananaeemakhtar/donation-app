<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $entries = Content::all();

        return view('admin.content.index', compact('entries'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' =>'required',
            'content' =>'required',
            'title'   =>   'nullable'
        ]);

        $data = [
            'section' => $request->section,
            'content' => $request->content,
            'title' => $request->title,
        ];

        $content = Content::where('section', $request->section)->first();
        
        if($content){
            $content->update($data);
        }else{
            Content::create($data);
        }

        return redirect()->route('content.index')->with('success', 'Content entry created successfully.');
    }

    public function edit(Content $content)
    {
        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'section' =>'required',
            'content' =>'required',
            'title' => 'nullable',
        ]);

        $data = [
            'section' => $request->section,
            'content' => $request->content,
            'title' => $request->title,
        ];

        $content->update($data);

        return redirect()->route('content.index')->with('success', 'Content entry updated successfully.');

    }

    public function delete(Content $content)
    {
        $content->delete();

        return redirect()->route('content.index')->with('success', 'Content entry deleted successfully.');
    }

}
