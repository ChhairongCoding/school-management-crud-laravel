<!-- resources/views/layouts/user.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<!-- Navbar -->
<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-indigo-600">E-Learning</a>
        <nav class="space-x-6 hidden md:block">
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'text-indigo-600 font-bold' : 'hover:text-indigo-600' }}">
                Home
            </a>

            <a href="{{ route('courses.index') }}"
               class="{{ request()->routeIs('courses.*') ? 'text-indigo-600 font-bold' : 'hover:text-indigo-600' }}">
                Courses
            </a>

            <a href="{{ route('about') }}"
               class="{{ request()->routeIs('about') ? 'text-indigo-600 font-bold' : 'hover:text-indigo-600' }}">
                About
            </a>

            <a href="{{ route('contact') }}"
               class="{{ request()->routeIs('contact') ? 'text-indigo-600 font-bold' : 'hover:text-indigo-600' }}">
                Contact
            </a>
        </nav>
        <div class="flex items-center space-x-4">
            @guest
                {{-- This button shows ONLY to guests --}}
                <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Login</a>
            @endguest

            @auth
                {{-- This dropdown menu shows ONLY to logged-in users --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center space-x-1 focus:outline-none">
                        <span class="font-semibold">{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto px-6 py-8 flex-grow">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-200 py-6 text-center">
    <p>&copy; {{ date('Y') }} E-Learning Platform. All rights reserved.</p>
</footer>

</body>

</html>
