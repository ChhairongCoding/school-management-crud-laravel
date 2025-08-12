@extends('user_views.layouts.user')

@section('title', $item->title ?? 'Details')

@section('content')
    <section class="max-w-3xl mx-auto my-20 p-8 bg-white rounded-lg shadow text-center">
        <h1 class="text-3xl font-bold mb-6">{{ $item->title ?? 'No Title' }}</h1>
        <p class="text-gray-700 leading-relaxed whitespace-pre-line">
            {{ $item->description ?? 'No description available.' }}
        </p>
    </section>
@endsection
