@extends('admin_views.layouts.app')

@section('title', 'Edit Lesson')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Lesson: {{ $lesson->title }}</h1>

    <form action="{{ route('admin.lessons.update', ['course' => $course->id, 'lesson' => $lesson->id]) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Lesson Title</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-2" value="{{ old('title', $lesson->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded p-2">{{ old('description', $lesson->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Current Video</label>
            @if($lesson->video_url)
                <video width="320" height="240" controls class="my-2 rounded">
                    <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                </video>
            @else
                <p class="text-gray-500">No video uploaded.</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="video" class="block text-gray-700">Upload New Video (Optional)</label>
            <input type="file" name="video" id="video" class="w-full border rounded p-2">
            @error('video')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Lesson</button>
    </form>
@endsection
