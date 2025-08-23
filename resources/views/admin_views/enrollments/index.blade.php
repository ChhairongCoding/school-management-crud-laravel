@extends('admin_views.layouts.app')

@section('title', 'All Enrollments')

@section('content')
    <h1 class="text-3xl font-bold mb-6">All Enrollments</h1>

    <!-- Search Form -->
    <form method="GET" class="mb-4 flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
            class="border rounded px-4 py-2 w-64">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Search
        </button>
    </form>

    <div class="bg-white rounded shadow-md p-6">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-2">Student Name</th>
                    <th>Student Email</th>
                    <th>Course Enrolled</th>
                    <th>Date Enrolled</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($enrollments as $enrollment)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-4">{{ $enrollment->user->name }}</td>
                        <td>{{ $enrollment->user->email }}</td>
                        <td>{{ $enrollment->course->title }}</td>
                        <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">
                            No students have enrolled in any courses yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
