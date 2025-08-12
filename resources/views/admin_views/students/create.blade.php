@extends('admin_views.layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Add New Student</h2>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow rounded space-y-4">
        {{csrf_field()}}

        <div>
            <label class="block mb-1">Name</label>
            <input name="name" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block mb-1">Email</label>
            <input name="email" type="email" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block mb-1">Phone number</label>
            <input name="phone" type="text" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block mb-1">Address</label>
            <input name="address" type="text" class="w-full border p-2 rounded" required>
        </div>
        <div class="flex space-x-2.5">
            <div class="w-[80%]">
                <label class="block mb-1">Course</label>
                <input name="course" type="text" class="w-full border p-2 rounded" required>
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
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mr-5">Save</button>
            <button
                type="button"
                name="cancel"
                class="px-4 py-2 rounded border border-gray-300 text-gray-700 hover:border-blue-700 hover:text-blue-700"
                onclick="window.location.href='{{ route('students.index') }}'">
                Cancel
            </button>
        </div>
    </form>
@endsection
