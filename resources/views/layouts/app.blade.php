<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<!-- Sidebar -->
<aside class="fixed top-0 left-0 w-64 h-full bg-white shadow-md z-30 hidden md:block">
    <div class="p-6 text-2xl font-bold border-b border-gray-200">
        Students System
    </div>
    <nav class="p-4 space-y-2">
        <a href="/" class="block px-4 py-2 rounded hover:bg-gray-200">Dashboard</a>
        <a href="/students" class="block px-4 py-2 rounded hover:bg-gray-200">Students</a>
        <a href="/courses" class="block px-4 py-2 rounded hover:bg-gray-200">Courses</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200 text-red-600">Logout</a>
    </nav>
</aside>

<!-- Mobile Sidebar Toggle -->
<div class="md:hidden fixed top-0 left-0 w-full bg-white shadow-md z-20 flex items-center justify-between px-4 py-3">
    <span class="text-xl font-semibold">Dashboard</span>
    <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="text-gray-600">
        ☰
    </button>
</div>

<!-- Mobile Sidebar Drawer -->
<div id="mobileMenu" class="md:hidden hidden fixed inset-0 bg-black bg-opacity-50 z-40">
    <div class="bg-white w-64 h-full p-4">
        <button onclick="document.getElementById('mobileMenu').classList.add('hidden')" class="mb-4 text-red-500">✕ Close</button>
        <a href="/dashboard" class="block px-4 py-2 rounded hover:bg-gray-200">Dashboard</a>
        <a href="/students" class="block px-4 py-2 rounded hover:bg-gray-200">Students</a>
        <a href="/courses" class="block px-4 py-2 rounded hover:bg-gray-200">Courses</a>
        <a href="/settings" class="block px-4 py-2 rounded hover:bg-gray-200">Settings</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200 text-red-600">Logout</a>
    </div>
</div>

<!-- Main Content -->
<main class="md:ml-64 mt-14 md:mt-0 p-6 h-screen overflow-y-auto">
    @yield('content')
</main>

<footer class="md:ml-64 p-4 bg-gray-200 text-center">
    @yield('footer')
</footer>
</body>
</html>
