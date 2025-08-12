<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Show Home Page
    public function home()
    {
        $courses = [
            (object)['id' => 1, 'title' => 'Web Development Bootcamp', 'category' => 'Programming', 'rating' => 4.8, 'image' => 'https://via.placeholder.com/400x200'],
            (object)['id' => 2, 'title' => 'UI/UX Design Masterclass', 'category' => 'Design', 'rating' => 4.9, 'image' => 'https://via.placeholder.com/400x200'],
            (object)['id' => 3, 'title' => 'Digital Marketing Essentials', 'category' => 'Marketing', 'rating' => 4.7, 'image' => 'https://via.placeholder.com/400x200'],
        ];

        return view('user_views.homes.home_page', compact('courses'));
    }

    // Show All Courses
    public function courses()
    {
        $courses = [
            (object)['id' => 1, 'title' => 'Web Development Bootcamp', 'category' => 'Programming', 'rating' => 4.8, 'image' => 'https://via.placeholder.com/400x200'],
            (object)['id' => 2, 'title' => 'UI/UX Design Masterclass', 'category' => 'Design', 'rating' => 4.9, 'image' => 'https://via.placeholder.com/400x200'],
            (object)['id' => 3, 'title' => 'Digital Marketing Essentials', 'category' => 'Marketing', 'rating' => 4.7, 'image' => 'https://via.placeholder.com/400x200'],
        ];

        return view('user_views.courses.course_page', compact('courses'));
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
        $item = Course::findOrFail($id);
        return view('user_views.courses.show', compact('item'));
    }





}
