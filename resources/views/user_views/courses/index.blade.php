@extends('user_views.layouts.user')

@section('title', 'All Courses')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-8">All Courses</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($courses as $course)
                <div class="bg-white border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    {{-- Use the same image classes as your homepage --}}
                    <img src="{{ asset('storage/' . $course->image_url) }}"
                         alt="{{ $course->title }}"
                         class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $course->title }}</h3>
                        @if($course->category)
                            <p class="text-sm text-gray-600 mb-4">{{ $course->category->name }}</p>
                        @endif
                        <div class="flex items-center justify-between">
                            <span class="text-yellow-500 font-semibold">⭐</span>
                            <a href="{{ route('courses.show', $course->id) }}" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="md:col-span-3 text-center text-gray-500">No courses are available at the moment.</p>
            @endforelse
        </div>
    </div>
@endsection
