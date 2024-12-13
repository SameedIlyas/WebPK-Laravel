<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Store the contact form data in the database
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Store the validated data in the database
        Contact::create($validated);

        // Return a success response (JSON or redirect)
        return response()->json(['message' => 'Your inquiry has been submitted successfully.']);
    }

    public function index()
    {
        return view('contact');
    }
}

