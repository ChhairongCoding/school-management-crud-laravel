<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Category;
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
        // This will now work correctly
        $categories = Category::all();

        // Return the correct admin view and pass the categories to it
        return view('admin_views.courses.create', compact('categories'));
    }



    public function store(Request $request)
    {
        // 1. Add 'category_id' to the validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id', // Make sure it's a valid category
            'image' => 'nullable|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public');
        }

        // 2. Add 'category_id' when creating the course
        Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'image_url' => $imagePath,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
    }

    // ... edit() method is fine ...
    // In app/Http/Controllers/CourseController.php

    public function edit(Course $course)
    {
        // It must fetch the categories
        $categories = Category::all();

        // It must pass BOTH variables to the view
        return view('admin_views.courses.edit', compact('course', 'categories'));
    }


    public function update(Request $request, Course $course)
    {
        // --- CHANGE 2: Add category_id to validation ---
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            if ($course->image_url) {
                Storage::disk('public')->delete($course->image_url);
            }
            $imagePath = $request->file('image')->store('courses', 'public');
            $validated['image_url'] = $imagePath;
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }


    public function destroy(Course $course)
    {
        if ($course->image_url) {
            Storage::disk('public')->delete($course->image_url);
        }
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }
    public function show(Course $course){
        return redirect()->route('admin.courses.edit', $course);
    }
}
