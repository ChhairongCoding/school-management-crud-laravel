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
            'video' => 'required|file|mimes:mp4,mov,avi,wmv|max:102400', // Max 100MB
            'description' => 'nullable|string',
        ]);

        $videoPath = $request->file('video')->store('lessons', 'public');

        $course->lessons()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'video_url' => $videoPath,
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
            'description' => 'nullable|string',
            'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:102400', // Video is optional
        ]);

        $videoPath = $lesson->video_url; // Keep the old path by default

        // Check if a new video file has been uploaded
        if ($request->hasFile('video')) {
            // Delete the old video file from storage
            if ($lesson->video_url) {
                Storage::disk('public')->delete($lesson->video_url);
            }
            // Store the new video file
            $videoPath = $request->file('video')->store('lessons', 'public');
        }

        $lesson->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'video_url' => $videoPath, // Save the new or existing path
        ]);

        return redirect()->route('admin.courses.edit', $course)->with('success', 'Lesson updated successfully!');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        // Delete the video file from storage
        if ($lesson->video_url) {
            Storage::disk('public')->delete($lesson->video_url);
        }

        $lesson->delete();
        return redirect()->route('admin.courses.edit', $course)->with('success', 'Lesson deleted successfully!');
    }
}
