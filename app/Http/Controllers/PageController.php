<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    // Show Home Page
    public function home()
    {
        $courses = Course::latest()->take(3)->get();
        $categories = Category::all();

        return view('user_views.homes.home_page', [
            'courses' => $courses,
            'categories' => $categories,
        ]);
    }

    // Show All Courses
    public function courses(Request $request)
    {
        $query = Course::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $courses = $query->latest()->get();

        $categories = Category::all();

        return view('user_views.courses.index', [
            'courses' => $courses,
            'categories' => $categories,
        ]);
    }
    public function myCourses()
    {
        $enrollments = Auth::user()->enrollments()->with('course')->get();

        return view('user_views.courses.my_courses', compact('enrollments'));
    }

    public function about()
    {
        return view('user_views.abouts.about_page');
    }

    public function contact()
    {
        return view('user_views.contacts.contacts_page');
    }

    public function show(Course $course)
    {
        $isEnrolled = false;
        if (Auth::check()) {
            $isEnrolled = Auth::user()->enrollments()->where('course_id', $course->id)->exists();
        }

        return view('user_views.courses.show', [
            'course' => $course,
            'isEnrolled' => $isEnrolled,
        ]);
    }
    public function showLesson(Lesson $lesson)
    {
        $user = Auth::user();

        // Get the course this lesson belongs to
        $course = $lesson->course;

        // Check if the user is enrolled in this course
        $isEnrolled = $user->enrollments()->where('course_id', $course->id)->exists();

        if (!$isEnrolled && $user->role !== 'admin') {
            // Redirect them back to the course page with an error message
            return redirect()->route('courses.show', $course)->with('error', 'You must enroll in this course to view the lessons.');
        }

        // If they are enrolled, show the lesson video
        return view('user_views.lessons.show', compact('lesson'));
    }
}
