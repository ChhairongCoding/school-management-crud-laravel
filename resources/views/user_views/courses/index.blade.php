@extends('admin_views.layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Manage Courses</h1>
            <a href="{{ route('admin.courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Add Course
            </a>
        </div>

        {{-- This shows the success message after creating a course --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded shadow-md p-6">
            <table class="w-full text-left">
                <thead>
                <tr class="border-b">
                    <th class="py-2">Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Students</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($courses as $course)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2">
                            <img src="{{ asset('storage/' . $course->image_url) }}" alt="{{ $course->title }}" class="w-24 h-12 object-cover rounded">
                        </td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->category->name ?? 'N/A' }}</td>
                        <td>${{ number_format($course->price, 2) }}</td>
                        <td>{{ $course->enrollments->count() }}</td>
                        <td class="flex items-center space-x-4 py-4">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No courses found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
