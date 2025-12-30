@extends('admin_views.layouts.app')

@section('content')
    <div class="Container">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Courses</h1>
            <div>
                <button
                    type="button"
                    onclick="window.location.href='{{ route('admin.courses.create') }}'"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add Course
                </button>
            </div>
        </div>

        <div class="overflow-x-auto bg-white rounded shadow p-4">
            <div class="flex flex-wrap justify-start gap-4">
                @forelse ($courses as $course)
                    {{-- Changed --}}
                    <a href="{{ route('admin.courses.show', $course->id) }}">
                        <div class="card relative w-72 shadow-xl rounded hover:bottom-2.5">
                            <img
                                class="h-40 w-full object-fit rounded-t"
                                src="{{ $course->image_url ? asset('storage/' . $course->image_url) : 'https://via.placeholder.com/150' }}"
                                alt="{{ $course->title }}">
                            <div class="contain p-2">
                                <h2 class="text-lg text-purple-500">{{ $course->title }}</h2>
                                <p class="text-gray-600 m-2">
                                    {{ Str::limit($course->description, 50) }}
                                </p>
                            </div>
                            <hr>
                            <div class="flex justify-between p-2">
                                <h3>
                                    {{ $course->enrollments->count() }} <span>students</span>
                                </h3>
                                <h3 class="text-purple-500">
                                    ${{ number_format($course->price, 2) }}
                                </h3>
                            </div>
                            <div class="flex justify-end p-2 gap-2">
                                {{-- Changed --}}
                                <a href="{{ route('admin.courses.edit', $course->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                {{-- Changed --}}
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-600">No courses available.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
