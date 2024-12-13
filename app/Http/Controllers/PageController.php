<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function services()
{
    $services = Service::all();
    return view('services', compact('services'));
}

public function addService(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'turnaround_time' => 'required|string|max:255',
    ]);

    Service::create($validated);

    return redirect('/services')->with('success', 'Service added successfully!');
}

public function removeService($id)
{
    $service = Service::findOrFail($id);
    $service->delete();

    return redirect('/services')->with('success', 'Service removed successfully!');
}




    
}
