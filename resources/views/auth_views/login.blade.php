<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">

<div class="bg-white/90 backdrop-blur-lg p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-200">
    <!-- Logo -->
    <div class="flex justify-center mb-4">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo" class="w-14 h-14">
    </div>

    <!-- Heading -->
    <h2 class="text-3xl font-extrabold text-center text-gray-800">Welcome Back</h2>
    <p class="text-sm text-gray-500 text-center mb-6">Login to continue learning</p>

    <!-- Error Message -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" name="email" required
                   class="w-full px-4 py-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>

        <!-- Remember & Forgot Password -->
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="rounded text-blue-600">
                <span>Remember me</span>
            </label>

        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold py-3 rounded-xl shadow hover:opacity-90 transition transform hover:scale-[1.02]">
            Login
        </button>
    </form>

    <!-- Divider -->
    <div class="my-6 flex items-center">
        <div class="flex-grow border-t border-gray-300"></div>
        <span class="px-3 text-gray-400 text-sm">OR</span>
        <div class="flex-grow border-t border-gray-300"></div>
    </div>

    <!-- Social Login -->
    <div class="flex gap-3">
        <button class="w-1/2 bg-white border rounded-xl py-2 shadow hover:bg-gray-50 flex items-center justify-center gap-2">
            <img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" class="w-5 h-5" alt="Google">
            Google
        </button>
        <button class="w-1/2 bg-white border rounded-xl py-2 shadow hover:bg-gray-50 flex items-center justify-center gap-2">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" class="w-5 h-5" alt="Facebook">
            Facebook
        </button>
    </div>

    <!-- Register Link -->
    <p class="text-sm text-center text-gray-500 mt-6">
        Don't have an account?
        <a href="{{ url('/register') }}" class="text-blue-500 font-semibold hover:underline">Sign up</a>
    </p>
</div>

</body>
</html>
