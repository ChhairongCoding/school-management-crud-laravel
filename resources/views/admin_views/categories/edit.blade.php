@extends('admin_views.layouts.app')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Category: {{ $category->name }}</h1>

    {{-- 1. Update the form action to point to the 'update' route --}}
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT') {{-- 2. Add the PUT method for updating --}}

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Category Name</label>
            {{-- 3. Show the existing category name --}}
            <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ $category->name }}">
            @error('name')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Category Image</label>
            <input type="file" name="image" id="image" class="w-full border rounded p-2">
            @if($category->image_url)
                <img src="{{ asset('storage/' . $category->image_url) }}" alt="Current Image" class="w-32 h-auto mt-2 rounded">
            @endif
            @error('image')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Category</button>
    </form>
@endsection
