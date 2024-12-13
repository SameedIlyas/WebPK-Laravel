<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display courses page for users
    public function index()
    {
        $courses = Course::all(); // Fetch all courses
        return view('courses', compact('courses')); // User view
    }

    // Display admin courses page with form and actions
    public function adminIndex()
    {
        $courses = Course::all(); // Fetch all courses
        return view('admin.courses', compact('courses')); // Admin view
    }

    // Handle adding a new course
    public function addCourse(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        Course::create($validated);

        return redirect()->route('admin.courses')->with('success', 'Course added successfully!');
    }

    // Handle removing a course
    public function removeCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses')->with('success', 'Course removed successfully!');
    }

    // Handle inline updates via AJAX
    public function updateCourseInline(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $course = Course::findOrFail($id);
        $course->update($validated);

        return response()->json(['success' => true, 'message' => 'Course updated successfully!']);
    }

    // Handle updating a course
    public function updateCourse(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $course = Course::findOrFail($id);
        $course->update($validated);

        return redirect()->route('admin.courses')->with('success', 'Course updated successfully!');
    }
}
