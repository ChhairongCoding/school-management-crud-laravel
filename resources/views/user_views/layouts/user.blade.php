<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - E-Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">

<header x-data="{ mobileMenu: false }" class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-extrabold text-indigo-600">E-Learning</a>

        <nav class="hidden md:flex items-center space-x-8 font-medium">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-indigo-600' : 'hover:text-indigo-600' }}">Home</a>
            <a href="{{ route('courses.index') }}" class="{{ request()->routeIs('courses.*') ? 'text-indigo-600' : 'hover:text-indigo-600' }}">Courses</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-indigo-600' : 'hover:text-indigo-600' }}">About</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-indigo-600' : 'hover:text-indigo-600' }}">Contact</a>
        </nav>

        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:bg-indigo-700">Login</a>
            @endguest
            @auth
                <div x-data="{ open: false }" class="relative hidden md:block">
                    <button @click="open = !open" class="flex items-center space-x-2 font-semibold">
                        <span>{{ auth()->user()->name }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-20">
                        <a href="{{ route('my.courses') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Courses</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
            <button class="md:hidden" @click="mobileMenu = !mobileMenu">
                <svg x-show="!mobileMenu" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="mobileMenu" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
    <div id="mobile-nav"
         x-show="mobileMenu"
         x-transition.origin.top
         x-cloak
         @keydown.escape.window="mobileMenu = false"
         class="md:hidden bg-white shadow-lg border-t border-gray-100"
    >
        <nav class="flex flex-col px-6 py-4 space-y-4 font-medium">
            <a href="{{ route('home') }}" class="hover:text-indigo-600" @click="mobileMenu=false">Home</a>
            <a href="{{ route('courses.index') }}" class="hover:text-indigo-600" @click="mobileMenu=false">Courses</a>
            <a href="{{ route('about') }}" class="hover:text-indigo-600" @click="mobileMenu=false">About</a>
            <a href="{{ route('contact') }}" class="hover:text-indigo-600" @click="mobileMenu=false">Contact</a>

            @guest
                <a href="{{ route('login') }}" class="bg-indigo-600 text-white text-center px-4 py-2 rounded-lg" @click="mobileMenu=false">
                    Login
                </a>
            @endguest

            @auth
                <a href="#" class="hover:text-indigo-600" @click="mobileMenu=false">My Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-left hover:text-red-500" @click="mobileMenu=false">Logout</button>
                </form>
            @endauth
        </nav>
    </div>

</header>

<main class="flex-grow container mx-auto px-6 py-8">
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif
    @yield('content')
</main>

<footer class="bg-gray-900 text-gray-300 py-10 mt-10">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-center md:text-left">
        <div>
            <h3 class="text-white font-bold text-lg mb-3">E-Learning</h3>
            <p class="text-sm opacity-80">Your platform to learn new skills anytime, anywhere.</p>
        </div>
        <div>
            <h3 class="text-white font-bold text-lg mb-3">Quick Links</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                <li><a href="{{ route('courses.index') }}" class="hover:text-white">Courses</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white">About</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-white font-bold text-lg mb-3">Stay Connected</h3>
            <div class="flex justify-center md:justify-start space-x-4 text-xl">
                <a href="#" class="hover:text-white">🌐</a>
                <a href="#" class="hover:text-white">🐦</a>
                <a href="#" class="hover:text-white">📘</a>
                <a href="#" class="hover:text-white">📸</a>
            </div>
        </div>
    </div>
    <div class="text-center text-sm text-gray-500 mt-8">
        &copy; {{ date('Y') }} E-Learning Platform. All rights reserved.
    </div>
</footer>

</body>
</html>
