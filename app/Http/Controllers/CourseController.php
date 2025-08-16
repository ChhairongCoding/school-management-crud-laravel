<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // ... index() and create() methods are fine ...
    public function index()
    {
        $courses = Course::all();
        return view('admin_views.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin_views.courses.create');
    }


    public function store(Request $request)
    {
        // ... validation and image upload logic is fine ...
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public');
        }

        Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'price' => $validated['price'],
            'image_url' => $imagePath,
        ]);

        // Change this line
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
    }

    // ... edit() method is fine ...
    public function edit(Course $course)
    {
        return view('admin_views.courses.edit', compact('course'));
    }


    public function update(Request $request, Course $course)
    {
        // ... validation and update logic is fine ...
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($course->image_url) {
                Storage::disk('public')->delete($course->image_url);
            }
            $imagePath = $request->file('image')->store('courses', 'public');
            $validated['image_url'] = $imagePath;
        } else {
            $validated['image_url'] = $course->image_url;
        }

        $course->update($validated);

        // Change this line
        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        // ... delete logic is fine ...
        if ($course->image_url) {
            Storage::disk('public')->delete($course->image_url);
        }
        $course->delete();

        // Change this line
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }
}
