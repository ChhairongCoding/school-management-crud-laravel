@extends('admin_views.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Manage Users</h1>
    <div class="bg-white rounded shadow-md p-6">
        <table class="w-full text-left">
            <thead>
            <tr class="border-b">
                <th class="py-2">Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-4">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                <span class="px-2 py-1 text-xs rounded-full {{ $user->role === 'admin' ? 'bg-green-200 text-green-800' : 'bg-blue-200 text-blue-800' }}">
                    {{ $user->role }}
                </span>
                    </td>

                    <td class="flex items-center space-x-4 py-4">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>

                    {{-- <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
