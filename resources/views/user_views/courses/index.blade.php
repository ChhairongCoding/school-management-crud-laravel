@extends('user_views.layouts.user')

@section('title', 'All Courses')

@section('content')
    <div class="container mx-auto px-4 py-10">
        {{-- Search & Filter --}}
        <form action="{{ route('courses.index') }}" method="GET"
              class="bg-white p-6 rounded-xl shadow-md flex flex-col md:flex-row gap-4 items-center mb-10">
            {{-- Search Box --}}
            <div class="relative w-full md:w-1/3">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search courses..."
                       class="w-full border rounded-lg px-4 py-2 pl-10 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
            </div>

            <select name="category"
                    class="w-full md:w-1/4 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            {{-- Button --}}
            <button type="submit"
                    class="bg-indigo-500 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-600 transition">
                Apply
            </button>
        </form>

        {{-- Title --}}
        <h1 class="text-3xl font-bold mb-8 text-gray-800">📚 All Courses</h1>

        {{-- Courses List --}}
        @if($courses->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($courses as $course)
                    <div class="bg-white border rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
                        {{-- Image --}}
                        <img src="{{ asset('storage/' . $course->image_url) }}"
                             alt="{{ $course->title }}"
                             class="w-full h-48 object-cover">

                        {{-- Content --}}
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $course->title }}</h3>
                            <p class="text-sm text-gray-500 mb-4">{{ $course->category->name ?? 'Uncategorized' }}</p>

                            <div class="flex items-center justify-between">
                                {{-- Rating placeholder --}}
                                <span class="text-yellow-500 font-semibold flex items-center gap-1">
                                    ⭐ {{ $course->rating ?? '4.5' }}
                                </span>

                                {{-- Button --}}
                                <a href="{{ route('courses.show', $course->id) }}"
                                   class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center mt-16 text-lg">😔 No courses found matching your criteria.</p>
        @endif
    </div>
@endsection
