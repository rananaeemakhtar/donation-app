<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceSchedule;
use Illuminate\Http\Request;

class ServiceScheduleController extends Controller
{
    public function index()
    {
        $services = ServiceSchedule::all();
        return view('admin/schedule_services.index', compact('services'));
    }
    public function create()
    {
        return view("admin.schedule_services.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
        ]);

        ServiceSchedule::create($request->only(['name', 'description']));

        return redirect()->route('schedule_services.index')->with('success', 'Service added successfully.');
    }

    public function edit($id)
    {
        $service = ServiceSchedule::findOrFail($id);
        return view('admin/schedule_services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
        ]);

        $service = ServiceSchedule::findOrFail($id);
        $service->update($request->only(['name', 'description']));

        return redirect()->route('schedule_services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        ServiceSchedule::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Service deleted successfully.');
    }
}
