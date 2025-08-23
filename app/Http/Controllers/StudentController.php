<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course')->get();

        // The variable here must be 'students'
        return view('admin_views.students.index', compact('students'));
    }

    public function create()
    {

        $courses = Course::all();
        return view('admin_views.students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        // 3. Add course_id to validation and data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'course_id' => 'required|exists:courses,id',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Student::create($validatedData);

        return redirect()->route('admin.students.index')->with('success', 'Student created successfully!');
    }

    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('admin_views.students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course_id' => 'required|exists:courses,id',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $student->update($validatedData);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully!');
    }
}
