@extends('admin_views.layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Manage Students</h1>
            <a href="{{ route('admin.courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Add Course
            </a>
        </div>

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
                <tbody class="divide-y divide-gray-100">
                @forelse($students as $student)
                    <tr>
                        <td class="px-6 py-4">{{ $student->name }}</td>
                        <td class="px-6 py-4">{{ $student->email }}</td>
                        <td class="px-6 py-4">{{ $student->course->title ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('admin.students.edit', $student->id) }}"
                               class="bg-yellow-400 text-white px-3 py-1 rounded">Edit</a>
                            <form class="inline-block" action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center px-6 py-4 text-gray-500">No students found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
