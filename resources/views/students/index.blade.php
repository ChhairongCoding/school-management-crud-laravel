@extends('layouts.app')

@section('content')
    <script>

        function confirmDelete(studentId) {
            if (confirm("Are you sure you want to delete this student?")) {
                window.location.href = `/students/${studentId}/delete`;
            }
        }
    </script>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Students</h1>
        <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Student</a>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-6 py-4 font-semibold">#</th>
                <th class="px-6 py-4 font-semibold">Name</th>
                <th class="px-6 py-4 font-semibold">Email</th>
                <th class="px-6 py-4 font-semibold">Course</th>
                <th class="px-6 py-4 font-semibold">Status</th>
                <th class="px-6 py-4 font-semibold text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @foreach($students as $student)
            <tr>
                    <td class="px-6 py-4">
                        {{$student->id}}
                    </td>
                    <td class="px-6 py-4">{{$student->name}}</td>
                    <td class="px-6 py-4">{{$student->email}}</td>
                    <td class="px-6 py-4">{{$student->course}}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs
                            {{ $student->status != 'Active' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            {{ $student->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <button
                            onclick="window.location.href='{{ route('students.edit',$student->id) }}'"
                            class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</button>
                        <button
                            onclick="confirmDelete({{ $student->id }})"
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Delete
                        </button>
                    </td>
            </tr>
            @endforeach
            <!-- Repeat more students here -->
            </tbody>
        </table>
    </div>
@endsection
