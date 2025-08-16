@extends('admin_views.layouts.app')

@section('content')
    <div class="bg-white p-6 shadow rounded space-y-4">
        <h2 class="text-2xl font-bold mb-4">Update Course</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data"
              class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded"
                       value="{{ old('title', $course->title) }}" required>
                @error('title')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded" rows="4"
                          required>{{ old('description', $course->description) }}</textarea>
                @error('description')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-2">
                <div class="w-2/3">
                    <label class="block mb-1 font-medium">Duration (hours)</label>
                    <input type="number" name="duration" class="w-full border p-2 rounded"
                           value="{{ old('duration', $course->duration) }}" required>
                    @error('duration')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/3">
                    <label class="block mb-1 font-medium">Price</label>
                    <input type="number" step="0.01" name="price" class="w-full border p-2 rounded"
                           value="{{ old('price', $course->price) }}" required>
                    @error('price')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Course Image</label>
                @if ($course->image_url)
                    <img src="{{ asset('storage/' . $course->image_url) }}" alt="{{ $course->title }}"
                         class="w-32 mb-2">
                @endif
                <input type="file" name="image" id="image" class="w-full border rounded p-2">
                @error('image')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mr-5">Update
                </button>
                <button type="button"
                        class="px-4 py-2 rounded border border-gray-300 text-gray-700 hover:border-blue-700 hover:text-blue-700"
                        onclick="window.location.href='{{ route('courses.index') }}'">Cancel
                </button>
            </div>
        </form>
    </div>
@endsection
