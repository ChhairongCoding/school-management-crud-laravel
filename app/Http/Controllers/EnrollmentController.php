<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $user = Auth::user();

        // Check if the user is already enrolled
        $isEnrolled = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->exists();

        if ($isEnrolled) {
            return redirect()->route('my.courses')->with('error', 'You are already enrolled in this course.');
        }

        // Create the enrollment record
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'price_paid' => $course->price,
        ]);

        return redirect()->route('my.courses')->with('success', 'You have successfully enrolled in the course!');
    }
}
