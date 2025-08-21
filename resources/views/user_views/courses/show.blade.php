@extends('user_views.layouts.user')

@section('title', $course->title)

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-4">{{ $course->title }}</h1>
        <p class="text-gray-600 mb-6">{{ $course->description }}</p>

        {{-- Add this section for the Enroll button --}}
        <div class="my-6">
            @auth
                {{-- Form for logged-in users to enroll --}}
                <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-green-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-600 transition">
                        Enroll Now for ${{ number_format($course->price, 2) }}
                    </button>
                </form>
            @endauth

            @guest
                {{-- Message for guests --}}
                <a href="{{ route('login') }}" class="block w-full text-center bg-indigo-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-indigo-600 transition">
                    Login to Enroll
                </a>
            @endguest
        </div>

        <hr class="my-6">

        <h2 class="text-2xl font-bold mb-4">Lessons</h2>
        {{-- ... your lessons list ... --}}
    </div>
@endsection
