<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin_views.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin_views.students.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Student::create($validatedData);

        // Use the correct admin route name for the redirect
        return redirect()->route('admin.students.index')->with('success', 'Student created successfully!');
    }

    public function edit(Student $student)
    {
        return view('admin_views.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $student->update($validatedData);

        // Use the correct admin route name for the redirect
        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        // Use the correct admin route name for the redirect
        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully!');
    }
}
