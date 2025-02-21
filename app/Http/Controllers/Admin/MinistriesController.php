<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MinistriesController extends Controller
{
    public function index()
    {
        $ministries = Ministry::get();

        return view("admin.ministry.index", compact('ministries'));
    }

    public function create()
    {
        return view("admin.ministry.create");
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ministry = new Ministry();
        $ministry->title = $request->title;
        $ministry->url = Str::slug($request->title, '_');
        $ministry->description = $request->description;

        if ($ministry->save()) {
            return redirect()->route('ministries.index')->with('success', 'Ministry created successfully.');
        } else {
            return redirect()->back()->with('error', 'Unabale to create Ministry');
        }
    }


    public function edit($ministry_id)
    {
        // dd($id);
        $ministry = Ministry::find($ministry_id);

        return view('admin.ministry.edit', compact('ministry'));
    }

    public function update(Request $request, $ministry_id)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ministry = Ministry::find($ministry_id);
        $ministry->title = $request->title;
        $ministry->url = Str::slug($request->title, '_');
        $ministry->description = $request->description;

        if ($ministry->save()) {
            return redirect()->route('ministries.index')->with('success', 'Ministry updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Unabale to update Ministry');
        }
    }

    public function delete($ministry_id)
    {
        $ministry = Ministry::findOrFail($ministry_id);

        $ministry->delete();
        return redirect()->route('ministries.index')->with('success', 'Ministry deleted successfully.');
    }
}
