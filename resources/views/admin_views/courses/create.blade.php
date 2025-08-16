@extends('admin_views.layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-6">Add New Course</h1>
        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full border rounded p-2" value="{{ old('title') }}">
                @error('title')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
                @error('description')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="duration" class="block text-gray-700">Duration (in hours)</label>
                <input type="number" name="duration" id="duration" class="w-full border rounded p-2" value="{{ old('duration') }}">
                @error('duration')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="w-full border rounded p-2" value="{{ old('price') }}">
                @error('price')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Course Image</label>
                <input type="file" name="image" id="image" class="w-full border rounded p-2">
                @error('image')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Course</button>
        </form>
    </div>
@endsection
