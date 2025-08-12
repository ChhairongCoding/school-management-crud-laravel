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
        Student::create($request->all());
        return redirect("students");
    }

    public function show(Student $student)
    {
        //
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin_views.students.edit', compact('student'));
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'course' => 'required|string',
            'status' => 'required|string',
        ]);

        $student = Student::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->course = $request->course;
        $student->status = $request->status;

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }
    public function destroy(Student $student)
    {
        //
    }
}

