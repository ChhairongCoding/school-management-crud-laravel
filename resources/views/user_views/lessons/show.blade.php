@extends('user_views.layouts.user')

@section('title', $lesson->title)

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ $lesson->title }}</h1>

        @if($lesson->description)
            <p class="text-gray-600 mb-6">{{ $lesson->description }}</p>
        @endif

        <div class="bg-black rounded-lg overflow-hidden shadow-lg">
            <video width="100%" controls controlsList="nodownload">
                <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
@endsection
