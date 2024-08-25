@extends('layouts.layout')

@section('content')
    <style>
        /* Custom CSS for additional styles */
        .btn-gradient {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .hero-bg {
            background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }
    </style>

    <div class="bg-gray-50">

        <!-- Header Section -->
        <header class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-4 shadow-lg">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-2xl font-bold">
                    <a href="#" class="hover:text-gray-200 transition duration-300">PMSSS</a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="hover:text-gray-200 transition duration-300">Home</a>
                    <a href="#features" class="hover:text-gray-200 transition duration-300">Features</a>
                    <a href="#" class="hover:text-gray-200 transition duration-300">About</a>
                    <a href="#" class="hover:text-gray-200 transition duration-300">Contact</a>
                </nav>
                <div class="md:hidden">
                    <button id="navbarToggle" class="focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="navbarMenu" class="hidden md:hidden bg-indigo-600 text-white">
                <a href="#" class="block px-4 py-2 hover:bg-indigo-700">Home</a>
                <a href="#features" class="block px-4 py-2 hover:bg-indigo-700">Features</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-700">About</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-700">Contact</a>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero-bg py-16">
            <div class="container mx-auto flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-center md:text-left">
                    <h2 class="text-4xl font-extrabold text-gray-800 leading-tight">Revolutionize Your Scholarship Experience
                    </h2>
                    <p class="mt-4 text-gray-600">Go paperless and simplify your scholarship journey with our all-in-one
                        platform.</p>
                    <a href="#features"
                        class="mt-6 inline-block btn-gradient text-white py-3 px-8 rounded-lg shadow-lg hover:opacity-90 transition duration-300">Explore
                        Features</a>
                </div>
                <div class="md:w-1/2 mt-8 md:mt-0">
                    <img src="{{ asset('images/3d-render-hand-with-money-academic-cap.jpg') }}"
                        alt="Scholarship Portal" class="mx-auto floating w-2/3">
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="bg-gray-100 py-16">
            <div class="container mx-auto">
                <h2 class="text-4xl font-extrabold text-center text-gray-800">Why Choose Our System?</h2>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div
                        class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/512/2772/2772264.png" alt="Interface"
                            class="w-20 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-800">User-Friendly Interface</h3>
                        <p class="mt-2 text-gray-600">Easily upload and manage your documents with a simple and intuitive
                            interface.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/512/4774/4774710.png" alt="Security"
                            class="w-20 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-800">Secure Authentication</h3>
                        <p class="mt-2 text-gray-600">Ensure your documents are safe with our robust security and
                            verification mechanisms.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/512/4880/4880204.png" alt="Workflow"
                            class="w-20 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-800">Automated Workflow</h3>
                        <p class="mt-2 text-gray-600">Seamlessly route documents from verification to payment processing
                            without delays.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/512/3571/3571608.png" alt="Tracking"
                            class="w-20 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-800">Real-Time Tracking</h3>
                        <p class="mt-2 text-gray-600">Stay informed with real-time updates on the status of your scholarship
                            submissions.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/512/3436/3436615.png" alt="Paperless"
                            class="w-20 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-800">Paperless Processing</h3>
                        <p class="mt-2 text-gray-600">Go green by eliminating the need for physical document submissions.
                        </p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/512/2910/2910812.png" alt="Privacy"
                            class="w-20 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-800">Privacy Compliance</h3>
                        <p class="mt-2 text-gray-600">Protect your personal information with our strict data privacy and
                            security standards.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-extrabold">Ready to Get Started?</h2>
                <p class="mt-4 text-lg">Join the digital revolution and submit your scholarship documents online today.</p>
                <a href="#"
                    class="mt-8 inline-block bg-white text-indigo-600 py-3 px-8 rounded-lg shadow-lg hover:opacity-90 transition duration-300">Submit
                    Now</a>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 PMSSS Scholarship Portal. All rights reserved.</p>
            </div>
        </footer>

    </div>

    <script>
        // Navbar toggle for mobile view
        document.getElementById('navbarToggle').onclick = function () {
            var menu = document.getElementById('navbarMenu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        };
    </script>
@endsection
