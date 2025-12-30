@extends('user_views.layouts.user')

@section('title', 'My Courses')

@section('content')
    <h1 class="text-3xl font-bold mb-8">My Courses</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($enrollments as $enrollment)
            <div class="bg-white border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <a href="{{ route('courses.show', $enrollment->course->id) }}">
                    <img src="{{ asset('storage/' . $enrollment->course->image_url) }}" alt="{{ $enrollment->course->title }}" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $enrollment->course->title }}</h3>
                    <div class="mt-4">
                        <a href="{{ route('courses.show', $enrollment->course->id) }}" class="w-full text-center block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">
                            Go to Course
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="md:col-span-3 text-center text-gray-500 py-16">
                <p class="text-xl">You have not enrolled in any courses yet.</p>
                <a href="{{ route('courses.index') }}" class="text-indigo-600 hover:underline mt-4 inline-block font-semibold">
                    Browse Courses
                </a>
            </div>
        @endforelse
    </div>
@endsection
@extends('user_views.layouts.user')

@section('title', 'My Courses')

@section('content')
    <h1 class="text-3xl font-bold mb-8">My Courses</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($enrollments as $enrollment)
            <div class="bg-white border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <a href="{{ route('courses.show', $enrollment->course->id) }}">
                    <img src="{{ asset('storage/' . $enrollment->course->image_url) }}" alt="{{ $enrollment->course->title }}" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $enrollment->course->title }}</h3>
                    <div class="mt-4">
                        <a href="{{ route('courses.show', $enrollment->course->id) }}" class="w-full text-center block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">
                            Go to Course
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="md:col-span-3 text-center text-gray-500 py-16">
                <p class="text-xl">You have not enrolled in any courses yet.</p>
                <a href="{{ route('courses.index') }}" class="text-indigo-600 hover:underline mt-4 inline-block font-semibold">
                    Browse Courses
                </a>
            </div>
        @endforelse
    </div>
@endsection
