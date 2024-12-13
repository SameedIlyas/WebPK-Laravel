<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Display services page for users
    public function index()
    {
        $services = Service::all(); // Fetch all services
        return view('services', compact('services')); // User view
    }

    // Display admin services page with form and actions
    public function adminIndex()
    {
        $services = Service::all(); // Fetch all services
        return view('admin.services', compact('services')); // Admin view
    }

    // Handle adding a new service
    public function addService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'turnaround_time' => 'required|string|max:255',
        ]);

        Service::create($validated);

        return redirect()->route('admin.services')->with('success', 'Service added successfully!');
    }

    // Handle removing a service
    public function removeService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services')->with('success', 'Service removed successfully!');
    }


    // Handle inline updates via AJAX
public function updateServiceInline(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'price' => 'nullable|numeric',
        'turnaround_time' => 'nullable|string|max:255',
    ]);

    $service = Service::findOrFail($id);
    $service->update($validated);

    return response()->json(['success' => true, 'message' => 'Service updated successfully!']);
}


    // Handle updating a service
    public function updateService(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'turnaround_time' => 'required|string|max:255',
        ]);

        $service = Service::findOrFail($id);
        $service->update($validated);

        return redirect()->route('admin.services')->with('success', 'Service updated successfully!');
    }
}


