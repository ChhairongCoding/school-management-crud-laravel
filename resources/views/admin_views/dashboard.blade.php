@extends('admin_views.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Dashboard Overview</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
            <div>
                <h2 class="text-sm font-semibold text-gray-500">Total Revenue</h2>
                <p class="text-3xl font-bold mt-1">${{ number_format($totalRevenue, 2) }}</p>
                <div class="flex items-baseline">
                    <p class="text-gray-500">vs last month</p>
                    <x-stat-change :change="$revenueChange" />
                </div>
            </div>
            <div class="bg-teal-100 rounded-full p-3">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01"></path></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
            <div>
                <h2 class="text-sm font-semibold text-gray-500">Total Users</h2>
                <p class="text-3xl font-bold mt-1">{{ $totalUsers }}</p>
                <div class="flex items-baseline">
                    <p class="text-gray-500">new this month</p>
                    <x-stat-change :change="$usersChange" />
                </div>
            </div>
            <div class="bg-sky-100 rounded-full p-3">
                <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.28-1.25-1.44-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.28-1.25 1.44-1.857M12 12a3 3 0 100-6 3 3 0 000 6z"></path></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
            <div>
                <h2 class="text-sm font-semibold text-gray-500">Total Value of Courses</h2>
                <p class="text-3xl font-bold mt-1">${{ number_format($totalCoursesValue, 2) }}</p>
            </div>
            <div class="bg-purple-100 rounded-full p-3">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </div>
        </div>


    </div>



    {{-- Your Recent Activity Section would go here --}}
@endsection
