<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'SIH-2024') }}</title>
    <!-- Feather Icons for 3D-like icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Swiper.js CSS for Carousel -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Alpine.js for dropdown functionality -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite('public/css/app.css')
    <!-- Jquery CDN-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- Logo Section -->
    <div class="bg-white py-4">
        <div class="max-w-7xl mx-auto px-4">
            <img src="{{ asset('images/home/aicte_full_logo.png') }}"
                alt="All India Council for Technical Education Logo" class="mx-auto" style="max-height: 100px;">
        </div>
    </div>

    <!-- Navbar -->
    <nav class="bg-blue-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 text-white text-lg font-semibold">
                    PM-USP YOJANA 2024-25
                </div>
                <!-- Desktop Links and Dropdowns -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/"
                        class="text-white hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-300 ease-in-out">Home</a>
                    <a href="/about"
                        class="text-white hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-300 ease-in-out">About</a>

                    <!-- Schemes Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="text-white hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-300 ease-in-out flex items-center">
                            Schemes <i data-feather="chevron-down" class="ml-2"></i>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute left-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20">
                            <div class="py-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">General Degree</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Professional
                                    Degree</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Medical Degree</a>
                            </div>
                        </div>
                    </div>

                    <a href="/contact"
                        class="text-white hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-300 ease-in-out">Contact</a>
                </div>

                <!-- Sign Up / Sign In / Logout Buttons -->
                <div class="flex items-center space-x-4">
                    @if (session('student'))
                        <!-- User is logged in, show the Logout button -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-white hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-300 ease-in-out">
                                Logout
                            </button>
                        </form>
                    @else
                        <!-- User is not logged in, show Sign Up and Sign In buttons -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="text-white hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-300 ease-in-out flex items-center">
                                Sign Up <i data-feather="chevron-down" class="ml-2"></i>
                            </button>
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20">
                                <div class="py-1">
                                    <a href="/register"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Student Sign
                                        Up</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Institution Sign
                                        Up</a>
                                </div>
                            </div>
                        </div>

                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="text-white hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-300 ease-in-out flex items-center">
                                Sign In <i data-feather="chevron-down" class="ml-2"></i>
                            </button>
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20">
                                <div class="py-1">
                                    <a href="/login"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Student Sign
                                        In</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Institution Sign
                                        In</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Mobile menu button -->
                <div class="-mr-2 flex md:hidden">
                    <button @click="open = !open"
                        class="bg-blue-700 inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-600 focus:outline-none">
                        <i data-feather="menu"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden" x-show="open" @click.away="open = false">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/"
                    class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg text-base font-medium">Home</a>
                <a href="/about"
                    class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg text-base font-medium">About</a>
                <a href="#"
                    class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg text-base font-medium">Schemes</a>
                <a href="#"
                    class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg text-base font-medium">Contact</a>
                @if (session('student'))
                    <a href="{{ route('logout') }}"
                        class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg text-base font-medium">
                        Logout
                    </a>
                @else
                    <a href="/register"
                        class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg text-base font-medium">Sign Up</a>
                    <a href="/login"
                        class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg text-base font-medium">Sign
                        In</a>
                @endif
            </div>
        </div>
    </nav>

    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul>
                        <li><a href="#" class="hover:text-gray-400">Home</a></li>
                        <li><a href="#" class="hover:text-gray-400">About</a></li>
                        <li><a href="#" class="hover:text-gray-400">Schemes</a></li>
                        <li><a href="#" class="hover:text-gray-400">Contact</a></li>
                    </ul>
                </div>
                <!-- Contact Information -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p class="mb-2">📞 +1 (123) 456-7890</p>
                    <p class="mb-2">✉️ info@scholarshipportal.com</p>
                    <p>🏢 123 Scholarship St, City, Country</p>
                </div>
                <!-- Social Media Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4" style="padding-left: 190px;">Follow Us</h3>
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="text-white hover:text-gray-400">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-white hover:text-gray-400">
                            <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-white hover:text-gray-400">
                            <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-white hover:text-gray-400">
                            <i class="bi bi-linkedin" style="font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8">
                <p>&copy; 2024 Scholarship Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Swiper.js Scripts -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
            },
        });

        // Initialize Feather Icons
        feather.replace();
    </script>

</body>

</html>
