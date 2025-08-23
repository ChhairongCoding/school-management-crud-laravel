<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function create(Course $course)
    {
        return view('admin_views.lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,mov,avi,wmv|max:102400',
            'description' => 'nullable|string',
        ]);

        $videoPath = $request->file('video')->store('lessons', 'public');

        $course->lessons()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'video_url' => $videoPath,
            'video_type' => 'local', // <-- Add this line
        ]);

        return redirect()->route('admin.courses.edit', $course)->with('success', 'Lesson added successfully!');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('admin_views.lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:102400',
            'description' => 'nullable|string',
        ]);

        $videoPath = $lesson->video_url;
        $videoType = $lesson->video_type;

        if ($request->hasFile('video')) {
            if ($lesson->video_url) {
                Storage::disk('public')->delete($lesson->video_url);
            }
            $videoPath = $request->file('video')->store('lessons', 'public');
            $videoType = 'local'; // <-- Add this line
        }

        $lesson->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'video_url' => $videoPath,
            'video_type' => $videoType, // <-- And this line
        ]);

        return redirect()->route('admin.courses.edit', $course)->with('success', 'Lesson updated successfully!');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        if ($lesson->video_url) {
            Storage::disk('public')->delete($lesson->video_url);
        }

        $lesson->delete();
        return redirect()->route('admin.courses.edit', $course)->with('success', 'Lesson deleted successfully!');
    }
}
