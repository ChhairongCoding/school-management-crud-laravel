<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category; // 1. Import the Category model
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Show Home Page
    public function home()
    {
        $courses = Course::latest()->take(3)->get();
        $categories = Category::all();

        // Change 'user_views.home' to match your file path
        return view('user_views.homes.home_page', [
            'courses' => $courses,
            'categories' => $categories,
        ]);
    }

    // Show All Courses
    public function courses()
    {
        // Fetch all courses from the database
        $courses = Course::all();
        return view('user_views.courses.index', compact('courses'));
    }

    public function about()
    {
        return view('user_views.abouts.about_page');
    }

    public function contact()
    {
        return view('user_views.contacts.contacts_page');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('user_views.courses.show', compact('course'));
    }
}
