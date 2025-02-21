<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('testimonial_ministry')->get();

        return view("admin.testimonial.index", compact('testimonials'));
    }

    public function create()
    {
        $ministries = Ministry::get();
        return view("admin.testimonial.create", compact('ministries'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = \Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'designation' => 'required',
                'ministry_id' => 'required',
                "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->ministry_id = $request->ministry_id;
        $testimonial->description = $request->description ? $request->description : null;

        if($request->hasFile('image')) {
            $imagename = time() . '.' . $request->image->extension();
            $path = $request->image->storeAs('images', $imagename, 'public');
            $testimonial['image'] = 'storage/' . $path;
        }

        if ($testimonial->save()) {
            return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
        } else {
            return redirect()->back()->with('error', 'Unabale to create Testimonial');
        }
    }


    public function edit($testimonial_id)
    {
        // dd($id);
        $testimonial = Testimonial::find($testimonial_id);
        $ministries = Ministry::get();
        return view('admin.testimonial.edit', compact('testimonial','ministries'));
    }

    public function update(Request $request, $testimonial_id)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'designation' => 'required',
                'ministry_id' => 'required',
                "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $testimonial = Testimonial::find($testimonial_id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->ministry_id = $request->ministry_id;
        $testimonial->description = $request->description ? $request->description : null;

        if($request->hasFile('image')) {
            $imagename = time() . '.' . $request->image->extension();
            $path = $request->image->storeAs('images', $imagename, 'public');
            $testimonial['image'] = 'storage/' . $path;
        }

        if ($testimonial->save()) {
            return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Unabale to update Testimonial');
        }
    }

    public function delete($testimonial_id)
    {
        $testimonial = Testimonial::findOrFail($testimonial_id);

        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
