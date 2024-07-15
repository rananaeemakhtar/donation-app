<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWeeklyServiceRequest;
use App\Models\WeeklyService;
use Illuminate\Http\Request;


class WeeklyServiceConroller extends Controller
{
    public function index()
    {
        $services = \App\Models\WeeklyService::all();
        return view('admin.weekly_services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.weekly_services.create');
    }

    public function store(StoreWeeklyServiceRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {
            $path = $request->image->store('public/images');
            $data['image'] = str_replace('public', 'storage', $path);
        }
        
        WeeklyService::create($data);

        return redirect(route('weekly_services.index'))->with('message', 'Service created successfully');
    }

    public function show(WeeklyService $service)
    {
        return view('admin.weekly_services.show', compact('service'));
    }

    public function edit(WeeklyService $service)
    {
        return view('admin.weekly_services.edit', compact('service'));
    }

    public function update(StoreWeeklyServiceRequest $request, WeeklyService $service)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {
            $path = $request->image->store('public/images');
            $data['image'] = str_replace('public', 'storage', $path);
        }
        
        $service->update($data);

        return redirect(route('weekly_services.index'))->with('message', 'Service updated successfully');
    }

    public function delete(WeeklyService $service)
    {
        $service->delete();

        return redirect(route('weekly_services.index'))->with('message', 'Service deleted successfully');
    }
}
