@extends('layouts.layout')

@section('content')
    <div class="bg-gray-100 font-sans">

        @if (Auth::check())
            {{ dd(Auth::user()) }} <!-- Debugging the user object -->
        @endif


        <!-- Hero Section with Swiper.js Carousel -->
        <div class="relative w-full h-screen overflow-hidden">
            <div class="swiper-container h-full">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide bg-cover bg-center h-full"
                        style="background-image: url('{{ asset('images/home/img1.jpg') }}');">
                        <div class="flex items-center justify-center h-full">
                            <h1 class="text-white text-6xl font-bold drop-shadow-lg">Empowering Education</h1>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide bg-cover bg-center h-full"
                        style="background-image: url('{{ asset('images/home/img3.jpg') }}');">
                        <div class="flex items-center justify-center h-full">
                            <h1 class="text-white text-6xl font-bold drop-shadow-lg">A Future of Possibilities</h1>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide bg-cover bg-center h-full"
                        style="background-image: url('{{ asset('images/home/img4.jpg') }}');">
                        <div class="flex items-center justify-center h-full">
                            <h1 class="text-white text-6xl font-bold drop-shadow-lg">Scholarship Access Simplified</h1>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="swiper-slide bg-cover bg-center h-full"
                        style="background-image: url('{{ asset('images/home/image5.jpg') }}');">
                        <div class="flex items-center justify-center h-full">
                            <h1 class="text-white text-6xl font-bold drop-shadow-lg">Your Path to Success</h1>
                        </div>
                    </div>
                </div>
                <!-- Swiper Navigation -->
                <div class="swiper-button-prev text-white"></div>
                <div class="swiper-button-next text-white"></div>
            </div>
        </div>

        <!-- Buttons Below Carousel -->
        <div class="bg-gray-100 py-8">
            <div class="max-w-7xl mx-auto flex justify-center space-x-4">
                <a href="/register"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">Register</a>
                <a href="/dash"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-green-700 transition duration-300">Dashboard</a>
                <a href="/apply"
                    class="bg-yellow-600 text-white px-6 py-3 rounded-lg shadow-lg bg-purple-600 transition duration-300">Apply</a>
            </div>
        </div>

        <!-- Cards Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Scrolling Notifications Card -->
                <div class="bg-blue-600 text-white p-6 rounded-lg shadow-lg overflow-hidden">
                    <h2 class="text-2xl font-bold mb-4">Notifications</h2>
                    <div id="notifications" class="overflow-y-scroll h-40">
                        <!-- Notifications will be injected here -->
                    </div>
                </div>
                <!-- About Schemes Card -->
                <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg overflow-hidden">
                    <h2 class="text-2xl font-bold mb-4">About the Scheme</h2>
                    <div id="schemes" class="overflow-y-scroll h-40">
                        <!-- Schemes will be injected here -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Scholarship Process Section -->
        <section class="py-16 bg-gray-100">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-8">Scholarship Process</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Flowchart Icons with Feather Icons -->
                    <div class="text-center transform hover:scale-105 transition duration-300">
                        <i data-feather="edit" class="mx-auto w-24 h-24 mb-4"></i>
                        <p>Step 1: Register</p>
                    </div>
                    <div class="text-center transform hover:scale-105 transition duration-300">
                        <i data-feather="clipboard" class="mx-auto w-24 h-24 mb-4"></i>
                        <p>Step 2: Apply</p>
                    </div>
                    <div class="text-center transform hover:scale-105 transition duration-300">
                        <i data-feather="check-circle" class="mx-auto w-24 h-24 mb-4"></i>
                        <p>Step 3: Verification</p>
                    </div>
                    <div class="text-center transform hover:scale-105 transition duration-300">
                        <i class="bi bi-currency-rupee" style="font-size: 4.6rem;"></i>
                        <p>Step 4: Disbursement</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Environmental Impact Section with Feather Icons -->
        <section class="py-16 bg-blue-600 text-white">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">Environmental Impact</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="transform hover:scale-105 transition duration-300">
                        <i class="bi bi-tree" style="font-size: 4.7rem;"></i>
                        <p class="text-5xl font-bold">1,200</p>
                        <p class="text-xl">Trees Saved</p>
                    </div>
                    <div class="transform hover:scale-105 transition duration-300">
                        <i data-feather="award" class="mx-auto w-24 h-24 mb-4"></i>
                        <p class="text-5xl font-bold">5,000</p>
                        <p class="text-xl">Scholarships Granted</p>
                    </div>
                    <div class="transform hover:scale-105 transition duration-300">
                        <i data-feather="credit-card" class="mx-auto w-24 h-24 mb-4"></i>
                        <p class="text-5xl font-bold">₹60+ Crores</p>
                        <p class="text-xl">Amount Disbursed</p>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <script>
        // Fetch notifications from the API using jQuery
        $(document).ready(function() {
            $.ajax({
                url: 'http://localhost:8000/api/notifications',
                method: 'GET',
                success: function(response) {
                    var notificationsContainer = $('#notifications');
                    notificationsContainer.empty(); // Clear the container

                    $.each(response, function(index, notification) {
                        var notificationElement = $('<p></p>')
                            .addClass('mb-2')
                            .html(
                                `<a href="${notification.url}" target="_blank" class="text-white underline">🔔 ${notification.message}</a>`
                            );
                        notificationsContainer.append(notificationElement);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching notifications:', error);
                }
            });

            // Fetch Schemes
            $.ajax({
                url: 'http://localhost:8000/api/schemes',
                method: 'GET',
                success: function(response) {
                    var schemesContainer = $('#schemes');
                    schemesContainer.empty(); // Clear the container

                    $.each(response, function(index, scheme) {
                        var schemeElement = $('<p></p>')
                            .addClass('mb-2')
                            .html(
                                `<a href="${scheme.url}" target="_blank" class="text-white underline">💡 ${scheme.description}</a>`
                            );
                        schemesContainer.append(schemeElement);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching schemes:', error);
                }
            });

        });
    </script>
@endsection
