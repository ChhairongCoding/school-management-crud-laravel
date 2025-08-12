@extends('user_views.layouts.user')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white py-16 rounded-lg">
        <div class="text-center max-w-4xl mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Learn Anytime, Anywhere</h1>
            <p class="text-lg mb-6">Access high-quality courses from expert instructors.</p>
            <a href="/courses" class="bg-white text-indigo-600 px-6 py-3 rounded-lg shadow hover:bg-gray-100 transition">
                Browse Courses
            </a>
        </div>
    </section>

    <!-- Featured Courses -->
    <section class="mt-12  mx-auto">
        <h2 class="text-2xl font-bold mb-6">Popular Courses</h2>
        <div class="grid gap-8 md:grid-cols-3">
            @foreach($courses as $course)
                <div class="bg-white border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ $course->image }}" alt="{{ $course->title }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ $course->category }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-yellow-500 font-semibold">⭐ {{ $course->rating }}</span>
                            <a href="/courses/{{ $course->id }}" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">Enroll</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="mt-20 bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-10">Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
                    <svg class="w-12 h-12 mx-auto mb-4 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20l9-5-9-5-9 5 9 5z"></path>
                        <path d="M12 12l9-5-9-5-9 5 9 5z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Expert Instructors</h3>
                    <p class="text-gray-600">Learn from industry leaders and passionate teachers who provide practical knowledge.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
                    <svg class="w-12 h-12 mx-auto mb-4 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="6" x2="12" y2="12"></line>
                        <line x1="12" y1="18" x2="12" y2="18"></line>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Flexible Learning</h3>
                    <p class="text-gray-600">Study at your own pace, anytime and anywhere — on desktop or mobile.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
                    <svg class="w-12 h-12 mx-auto mb-4 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 17v-6h6v6"></path>
                        <path d="M12 3v4"></path>
                        <path d="M5 21h14a2 2 0 002-2v-5H3v5a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Certification</h3>
                    <p class="text-gray-600">Earn certificates upon course completion to showcase your skills.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="mt-20  mx-auto ">
        <h2 class="text-2xl font-bold mb-6">Browse by Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @php
                $categories = [
                    ['name' => 'Programming', 'icon' => '💻'],
                    ['name' => 'Design', 'icon' => '🎨'],
                    ['name' => 'Marketing', 'icon' => '📈'],
                    ['name' => 'Business', 'icon' => '💼'],
                    ['name' => 'Photography', 'icon' => '📷'],
                    ['name' => 'Music', 'icon' => '🎵'],
                    ['name' => 'Personal Development', 'icon' => '🧠'],
                    ['name' => 'Health & Fitness', 'icon' => '🏋️‍♂️'],
                ];
            @endphp

            @foreach($categories as $category)
                <a href="/courses?category={{ urlencode($category['name']) }}" class="flex flex-col items-center p-6 bg-white rounded-lg shadow hover:shadow-lg transition text-center">
                    <div class="text-5xl mb-3">{{ $category['icon'] }}</div>
                    <span class="text-lg font-semibold">{{ $category['name'] }}</span>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="mt-20 bg-indigo-600 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-10">What Our Students Say</h2>
            <div class="space-y-8">
                @php
                    $testimonials = [
                        ['name' => 'Jane Doe', 'comment' => 'The courses helped me switch my career to web development!', 'avatar' => 'https://randomuser.me/api/portraits/women/68.jpg'],
                        ['name' => 'John Smith', 'comment' => 'Excellent instructors and flexible schedule.', 'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg'],
                        ['name' => 'Sarah Lee', 'comment' => 'I love the certification which helped me land a new job.', 'avatar' => 'https://randomuser.me/api/portraits/women/44.jpg'],
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 bg-indigo-700 p-6 rounded-lg shadow-lg">
                        <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="w-16 h-16 rounded-full border-2 border-white">
                        <div>
                            <p class="italic mb-2">"{{ $testimonial['comment'] }}"</p>
                            <h4 class="font-bold">{{ $testimonial['name'] }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="mt-20 bg-gray-800 text-white py-12 text-center rounded-lg max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Ready to start learning?</h2>
        <p class="mb-8">Join thousands of students and gain new skills today.</p>
        <a href="/register" class="bg-indigo-500 hover:bg-indigo-700 text-white px-8 py-3 rounded font-semibold transition">Get Started</a>
    </section>
@endsection
