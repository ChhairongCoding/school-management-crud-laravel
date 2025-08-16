@extends('admin_views.layouts.app')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Manage Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Category</a>
    </div>
    <div class="bg-white rounded shadow-md p-6">
        <table class="w-full text-left">
            <thead>
            <tr class="border-b">
                <th class="py-2">Image</th> <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2">
                        <img src="{{ asset('storage/' . $category->image_url) }}"
                             alt="{{ $category->name }}"
                             class="w-18 h-10 object-cover rounded">
                    </td>
                    <td class="py-4">{{ $category->name }}</td>
                    <td class="flex items-center space-x-4 py-4">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
