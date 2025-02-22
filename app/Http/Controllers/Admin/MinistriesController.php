<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use App\Models\Testimonial;
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
                'title' => 'required',
                'testimonials' => 'nullable|array',
                'testimonials.*.name' => 'required|string|max:255',
                'testimonials.*.designation' => 'required|string|max:255',
                'testimonials.*.description' => 'nullable|string',
                'testimonials.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

            // **Check if testimonials exist**
            if (!empty($request->testimonials)) {
                foreach ($request->testimonials as $testimonialData) {
                    $testimonial = new Testimonial();
                    $testimonial->name = $testimonialData['name'];
                    $testimonial->designation = $testimonialData['designation'];
                    $testimonial->ministry_id = $ministry->id;
                    $testimonial->description = $testimonialData['description'] ?? null;

                    if (isset($testimonialData['image'])) {
                        $image = $testimonialData['image'];
                        $imageName = time() . '.' . $image->extension();
                        $path = $image->storeAs('images', $imageName, 'public');
                        $testimonial->image = 'storage/' . $path;
                    }

                    $testimonial->save();
                }
            }

            return redirect()->route('ministries.index')->with('success', 'Ministry created successfully.');
        } else {
            return redirect()->back()->with('error', 'Unabale to create Ministry');
        }
    }


    public function edit($ministry_id)
    {
        // dd($id);
        $ministry = Ministry::find($ministry_id);
        $testimonials = Testimonial::where('ministry_id', $ministry_id)->get();
        return view('admin.ministry.edit', compact('ministry', 'testimonials'));
    }

    public function update(Request $request, $ministry_id)
    {
        // dd($request->all());
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'testimonials' => 'nullable|array',
                'testimonials.*.id' => 'nullable|exists:testimonials,id',
                'testimonials.*.name' => 'required|string|max:255',
                'testimonials.*.designation' => 'required|string|max:255',
                'testimonials.*.description' => 'nullable|string',
                'testimonials.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ministry = Ministry::find($ministry_id);
        $ministry->title = $request->title;
        $ministry->url = Str::slug($request->title, '_');
        $ministry->description = $request->description;
        $ministry->save();

        // Track testimonial IDs from request
        $existingTestimonialIds = [];

        if ($request->has('testimonials')) {
            foreach ($request->testimonials as $testimonialData) {
                if (isset($testimonialData['id']) && $testimonialData['id']) {
                    // Update existing testimonial
                    $testimonial = Testimonial::findOrFail($testimonialData['id']);
                } else {
                    // Create new testimonial
                    $testimonial = new Testimonial();
                    $testimonial->ministry_id = $ministry->id;
                }

                $testimonial->name = $testimonialData['name'];
                $testimonial->designation = $testimonialData['designation'];
                $testimonial->description = $testimonialData['description'] ?? null;

                // Handle image upload
                if (isset($testimonialData['image']) && $testimonialData['image']) {
                    $image = $testimonialData['image'];
                    $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                    $path = $image->storeAs('images', $imageName, 'public');
                    $testimonial->image = 'storage/' . $path;
                }

                $testimonial->save();
                $existingTestimonialIds[] = $testimonial->id;
            }
        }

        // **Delete removed testimonials**
        Testimonial::where('ministry_id', $ministry->id)
            ->whereNotIn('id', $existingTestimonialIds)
            ->delete();

        return redirect()->route('ministries.index')->with('success', 'Ministry updated successfully.');
    }

    public function delete($ministry_id)
    {
        $ministry = Ministry::findOrFail($ministry_id);

        // Delete related testimonials
        $ministry->ministry_testimonial()->delete();

        // Delete the ministry
        $ministry->delete();
        return redirect()->route('ministries.index')->with('success', 'Ministry deleted successfully.');
    }
}
