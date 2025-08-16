@extends('admin_views.layouts.app')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Add New Category</h1>

    {{-- 1. Add enctype to the form tag --}}
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Category Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ old('name') }}">
            @error('name')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        {{-- 2. Change the input from text to file --}}
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Category Image</label>
            <input type="file" name="image" id="image" class="w-full border rounded p-2">
            @error('image')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Category</button>
    </form>
@endsection
