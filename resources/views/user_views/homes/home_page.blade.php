@extends('user_views.layouts.user')

@section('title', 'Home')

@section('content')
    <section class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white py-16 rounded-lg">
        <div class="text-center max-w-4xl mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Learn Anytime, Anywhere</h1>
            <p class="text-lg mb-6">Access high-quality courses from expert instructors.</p>
            <a href="{{ route('courses.index') }}" class="bg-white text-indigo-600 px-6 py-3 rounded-lg shadow hover:bg-gray-100 transition">
                Browse Courses
            </a>
        </div>
    </section>

    <section class="mt-12 mx-auto">
        <h2 class="text-2xl font-bold mb-6">Popular Courses</h2>
        <div class="grid gap-8 md:grid-cols-3">
            @forelse($courses as $course)
                <div class="bg-white border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $course->image_url) }}" alt="{{ $course->title }}" class="w-full h-50 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $course->title }}</h3>

                        {{-- Safely checks if a category exists before trying to display it --}}
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
                <p class="md:col-span-3 text-center text-gray-500">No popular courses are available at the moment.</p>
            @endforelse
        </div>
    </section>

    <section class="mt-20 bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-10">Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Expert Instructors</h3>
                    <p class="text-gray-600">Learn from industry leaders and passionate teachers.</p>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Flexible Learning</h3>
                    <p class="text-gray-600">Study at your own pace, anytime and anywhere.</p>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Certification</h3>
                    <p class="text-gray-600">Earn certificates to showcase your skills.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-20 mx-auto">
        <h2 class="text-2xl font-bold mb-6">Browse by Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @forelse($categories as $category)
                <a href="/courses?category={{ $category->slug }}" class="flex flex-col items-center p-6 bg-white rounded-lg shadow hover:shadow-lg transition text-center">
                    <img src="{{ asset('storage/' . $category->image_url) ?? 'https://via.placeholder.com/100' }}" alt="{{ $category->name }}" class="w-16 h-16 object-contain mb-3">
                    <span class="text-lg font-semibold">{{ $category->name }}</span>
                </a>
            @empty
                <p class="md:col-span-4 text-center text-gray-500">No categories found.</p>
            @endforelse
        </div>
    </section>

    <section class="mt-20 bg-gray-800 text-white py-12 text-center rounded-lg max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Ready to start learning?</h2>
        <p class="mb-8">Join thousands of students and gain new skills today.</p>
        <a href="{{ route('register') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-8 py-3 rounded font-semibold transition">Get Started</a>
    </section>
@endsection
