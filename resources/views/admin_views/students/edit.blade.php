@extends('admin_views.layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Update Student</h2>
    <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow rounded space-y-4">

    @csrf @method('PUT')
        <div>
            <label class="block mb-1">Name</label>
            <input name="name" value="{{ $student->name }}" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block mb-1">Email</label>
            <input name="email" type="email" value="{{ $student->email }}" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block mb-1">Phone</label>
            <input name="phone" type="text" value="{{ $student->phone }}" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block mb-1">address</label>
            <input name="address" type="text" value="{{ $student->address }}" class="w-full border p-2 rounded" required>
        </div>
        <div class="flex space-x-2.5">
            <div class="w-[80%]">
                <label class="block mb-1">Course</label>
                <input name="course" type="text" value="{{$student->course}}" class="w-full border p-2 rounded" required>
            </div>
            <div class="w-[20%]">
                <label class="block mb-1 text-sm font-medium text-gray-700 pb-1.5">Action</label>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-700">
                    <option value="Active">Active</option>
                    <option value="No Active">No Active</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end ">
            <button
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        </div>

    </form>
@endsection
