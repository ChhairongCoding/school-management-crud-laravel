@extends('admin_views.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Update Course: {{ $course->title }}</h1>

    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md mb-8">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title', $course->title) }}" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded" rows="4" required>{{ old('description', $course->description) }}</textarea>
            </div>
            <div>
                <label for="category_id" class="block text-gray-700 font-semibold mb-2">Category</label>
                <select name="category_id" id="category_id" class="w-full px-3 py-2 border rounded-lg" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label class="block mb-1 font-medium">Duration (hours)</label>
                    <input type="number" name="duration" class="w-full border p-2 rounded" value="{{ old('duration', $course->duration) }}" required>
                </div>
                <div class="w-1/2">
                    <label class="block mb-1 font-medium">Price</label>
                    <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" value="{{ old('price', $course->price) }}" required>
                </div>
            </div>
            <div>
                <label class="block mb-1 font-medium">Course Image</label>
                @if ($course->image_url)
                    <img src="{{ asset('storage/' . $course->image_url) }}" alt="{{ $course->title }}" class="w-32 mb-2 rounded">
                @endif
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Course</button>
        </div>
    </form>

    <hr class="my-8">

    {{-- This is the new section for managing lessons --}}
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Manage Lessons</h2>
            <a href="{{ route('admin.lessons.create', $course->id) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Add New Lesson
            </a>
        </div>

        <ul class="space-y-2">
            @forelse ($course->lessons as $lesson)
                <li class="flex justify-between items-center p-2 border rounded">
                    <span>{{ $lesson->title }}</span>
                    <div class="flex items-center space-x-2">
                        {{-- Functional Edit Link --}}
                        <a href="{{ route('admin.lessons.edit', ['course' => $course->id, 'lesson' => $lesson->id]) }}" class="text-sm text-yellow-600 hover:underline">Edit</a>

                        {{-- Functional Delete Form & Button --}}
                        <form action="{{ route('admin.lessons.destroy', ['course' => $course->id, 'lesson' => $lesson->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <p class="text-gray-500">No lessons have been added to this course yet.</p>
            @endforelse
        </ul>
    </div>
@endsection
