<!-- resources/views/layouts/user.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<!-- Navbar -->
<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-indigo-600">E-Learning</a>
        <nav class="space-x-6 hidden md:block">
            <a href="/user/home" class="hover:text-indigo-600">Home</a>
            <a href="/user/courses" class="hover:text-indigo-600">Courses</a>
            <a href="/user/about" class="hover:text-indigo-600">About</a>
            <a href="/user/contact" class="hover:text-indigo-600">Contact</a>
        </nav>
        <a href="/login" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Login</a>
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
