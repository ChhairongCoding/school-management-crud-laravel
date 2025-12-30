@extends('user_views.layouts.user')

@section('title', 'Home')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-24 rounded-2xl shadow-lg">
        <div class="text-center max-w-5xl mx-auto px-6">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6">
                Learn Anytime, <span class="text-yellow-300">Anywhere</span>
            </h1>
            <p class="text-lg md:text-xl mb-8 opacity-90">
                Access <span class="font-semibold">high-quality courses</span> from expert instructors and level up your skills today.
            </p>
            <a href="{{ route('courses.index') }}"
               class="bg-yellow-300 text-indigo-800 px-8 py-4 rounded-xl font-bold text-lg shadow hover:shadow-2xl hover:scale-105 transition transform">
                🚀 Browse Courses
            </a>
        </div>
    </section>

    {{-- Popular Courses --}}
    <section class="mt-20 max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-10 text-gray-800">🔥 Popular Courses</h2>
        <div class="grid gap-10 md:grid-cols-3">
            @forelse($courses as $course)
                <div class="bg-white border rounded-xl overflow-hidden shadow hover:shadow-2xl hover:scale-[1.02] transition transform">
                    <img src="{{ asset('storage/' . $course->image_url) }}" alt="{{ $course->title }}"
                         class="w-full h-48 object-cover">
                    <div class="p-5 flex flex-col justify-between h-48">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $course->title }}</h3>
                            @if($course->category)
                                <p class="text-sm text-indigo-600 font-medium mb-4">{{ $course->category->name }}</p>
                            @endif
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-yellow-500 font-semibold">⭐ 4.8</span>
                            <a href="{{ route('courses.show', $course->id) }}"
                               class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="md:col-span-3 text-center text-gray-500">No popular courses are available at the moment.</p>
            @endforelse
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="mt-24 bg-gray-50 py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gray-800">💡 Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-indigo-600 text-4xl mb-4">👩‍🏫</div>
                    <h3 class="text-xl font-semibold mb-3">Expert Instructors</h3>
                    <p class="text-gray-600">Learn from industry leaders and passionate teachers.</p>
                </div>
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-indigo-600 text-4xl mb-4">⏰</div>
                    <h3 class="text-xl font-semibold mb-3">Flexible Learning</h3>
                    <p class="text-gray-600">Study at your own pace, anytime and anywhere.</p>
                </div>
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-indigo-600 text-4xl mb-4">📜</div>
                    <h3 class="text-xl font-semibold mb-3">Certification</h3>
                    <p class="text-gray-600">Earn certificates to showcase your skills.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Browse Categories --}}
    <section class="mt-24 max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-10 text-gray-800">📂 Browse by Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @forelse($categories as $category)
                <a href="/courses?category={{ $category->slug }}"
                   class="flex flex-col items-center p-6 bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition transform text-center">
                    <img src="{{ asset('storage/' . $category->image_url) ?? 'https://via.placeholder.com/100' }}"
                         alt="{{ $category->name }}"
                         class="w-20 h-20 object-contain mb-4">
                    <span class="text-lg font-semibold text-gray-800">{{ $category->name }}</span>
                </a>
            @empty
                <p class="md:col-span-4 text-center text-gray-500">No categories found.</p>
            @endforelse
        </div>
    </section>

    <section class="mt-24 bg-gradient-to-r from-indigo-700 to-purple-700 text-white py-20 rounded-2xl shadow-lg text-center max-w-5xl mx-auto px-6">
        <h2 class="text-4xl font-bold mb-6">🚀 Ready to start learning?</h2>
        <p class="mb-8 text-lg opacity-90">Join thousands of students and gain new skills today.</p>
        <a href="{{ route('register') }}"
           class="bg-yellow-300 text-indigo-900 px-10 py-4 rounded-xl font-bold text-lg shadow hover:shadow-2xl hover:scale-105 transition transform">
            Get Started
        </a>
    </section>
@endsection
