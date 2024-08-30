@extends('layouts.layout')

@section('content')
<style>
    .gradient-bg {
        background: linear-gradient(to right, #4A90E2, #50E3C2);
    }
</style>
<div class="bg-gray-100">
    <!-- Contact Section -->
    <section class="bg-white py-20 gradient-bg">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center text-white mb-8">Contact Us</h1>
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-1/2 lg:pr-12">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Get in Touch</h2>
                    <p class="text-gray-700 mb-6">We would love to hear from you! Whether you have questions, feedback, or need assistance, feel free to reach out to us using the form below or contact us directly.</p>
                    <ul class="text-gray-700">
                        <li class="mb-4">
                            <strong class="text-gray-800">Address:</strong> 123 PMSSS Lane, Scholarship City, Country
                        </li>
                        <li class="mb-4">
                            <strong class="text-gray-800">Email:</strong> support@pmsssyojna.org
                        </li>
                        <li class="mb-4">
                            <strong class="text-gray-800">Phone:</strong> +123 456 7890
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2 mt-8 lg:mt-0">
                    <form class="bg-white p-8 shadow-lg rounded-lg">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" id="name" type="text" placeholder="Your Name">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" id="email" type="email" placeholder="Your Email">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Message</label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" id="message" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection