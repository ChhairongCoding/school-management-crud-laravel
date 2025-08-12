@extends('user_views.layouts.user')

@section('title', 'Contact Us')

@section('content')
    <section class="bg-white p-8 rounded-lg shadow">
        <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
        <p class="text-gray-700 mb-6">Have questions or need support? Fill out the form below, and our team will get back to you soon.</p>

        <form action="/contact" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 mb-2">Your Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Your Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Message</label>
                <textarea name="message" rows="4" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500" required></textarea>
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Send Message
            </button>
        </form>
    </section>
@endsection
