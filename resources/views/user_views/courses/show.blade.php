@extends('user_views.layouts.user')

@section('title', $course->title)

@section('content')
    <div class="container mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Left Column: Course Details --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6">
            {{-- Course Header --}}
            <div class="mb-6">
                <h1 class="text-4xl font-extrabold text-gray-800">{{ $course->title }}</h1>
                <p class="text-gray-600 mt-3 leading-relaxed">{{ $course->description }}</p>
            </div>

            <hr class="my-6 border-gray-200">

            {{-- Lessons Section --}}
            <h2 class="text-2xl font-bold mb-4">📚 Lessons</h2>
            <div class="space-y-4">
                @forelse ($course->lessons as $lesson)
                    <a href="{{ route('lessons.show', $lesson->id) }}"
                       class="block bg-gray-50 hover:bg-gray-100 rounded-xl p-4 transition">
                        <h3 class="font-semibold text-gray-800">{{ $lesson->title }}</h3>
                        @if($lesson->description)
                            <p class="text-sm text-gray-500 mt-1">{{ $lesson->description }}</p>
                        @endif
                    </a>
                @empty
                    <div class="bg-yellow-50 p-4 rounded-xl text-yellow-700">
                        No lessons have been added yet. Check back soon!
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Right Column: Enroll Section --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-6 h-fit">
            <div class="text-center mb-6">
                <p class="text-3xl font-bold text-gray-800 mb-2">${{ number_format($course->price, 2) }}</p>
                <p class="text-gray-500">Lifetime Access</p>
            </div>
            @auth
                @php
                    $isEnrolled = auth()->user()->enrollments()->where('course_id', $course->id)->exists();
                @endphp

                @if ($isEnrolled)
                    @if ($course->lessons->isNotEmpty())
                        <a href="{{ route('lessons.show', $course->lessons->first()->id) }}"
                           class="block w-full text-center bg-gray-500 text-white font-semibold text-lg py-3 px-6 rounded-xl">
                            ✓ Enrolled (Go to First Lesson)
                        </a>
                    @else
                        <p class="text-gray-500 text-center">No lessons available yet.</p>
                    @endif
                @else
                    {{-- Show Enroll Button --}}
                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold py-3 rounded-xl hover:opacity-90">
                            🎓 Enroll Now
                        </button>
                    </form>
                @endif
            @endauth




        @guest
                <a href="{{ route('login') }}"
                   class="block w-full text-center bg-blue-500 text-white font-semibold py-3 rounded-xl hover:bg-blue-600">
                    🔑 Login to Enroll
                </a>
            @endguest
        </div>
    </div>
@endsection
