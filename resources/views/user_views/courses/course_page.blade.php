@extends('user_views.layouts.user')

@section('title', 'Courses')

@section('content')
    <h1 class="text-3xl font-bold mb-6">All Courses</h1>
    <div class="grid gap-8 md:grid-cols-3">
        @foreach($courses as $course)
            <div class="bg-white border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="{{ $course->image }}" alt="{{ $course->title }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $course->title }}</h3>
                    <p class="text-sm text-gray-600 mb-4">{{ $course->category }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-yellow-500">⭐ {{ $course->rating }}</span>
                        <a href="/courses/{{ $course->id }}" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
