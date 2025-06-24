@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Dashboard Overview</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Total Users</h2>
            <p class="text-3xl mt-2">1,234</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Revenue</h2>
            <p class="text-3xl mt-2">$5,678</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Visits</h2>
            <p class="text-3xl mt-2">12,345</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
        <ul class="space-y-2">
            <li>- User John registered</li>
            <li>- Order #1234 placed</li>
            <li>- Profile updated</li>
        </ul>
    </div>
@endsection
