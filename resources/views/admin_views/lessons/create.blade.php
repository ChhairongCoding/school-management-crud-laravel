@extends('admin_views.layouts.app')

@section('title', 'Add New Lesson')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Add New Lesson to: {{ $course->title }}</h1>

        <form action="{{ route('admin.lessons.store', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-gray-700 font-semibold">Lesson Title</label>
                <input type="text" name="title" id="title" class="w-full border rounded p-2 mt-1" required>
            </div>
            <div>
                <label for="video" class="block text-gray-700 font-semibold">Video File</label>
                <input type="file" name="video" id="video" class="w-full border rounded p-2 mt-1" required>
                @error('video')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div>
                <label for="description" class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" id="description" rows="3" class="w-full border rounded p-2 mt-1"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Lesson</button>
        </form>
    </div>
@endsection
