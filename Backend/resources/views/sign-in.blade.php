<x-guest-layout>
    <div id="container" class="container sign-in">
        <div class="flex justify-center items-center min-h-screen bg-gray-100">
            <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-6 text-center">Student Login</h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">{{ __('Email') }}</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <i class='bx bxs-user text-gray-500 px-3'></i>
                            <input id="email" type="email" name="email" placeholder="Email" required 
                                   class="w-full px-4 py-2 text-gray-700 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   value="{{ old('email') }}" autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">{{ __('Password') }}</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <i class='bx bxs-lock-alt text-gray-500 px-3'></i>
                            <input id="password" type="password" name="password" placeholder="Password" required 
                                   class="w-full px-4 py-2 text-gray-700 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   autocomplete="current-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mb-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="ml-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <p class="mt-4 text-center text-sm text-gray-600">
                    <span>Don't have an account?</span>
                    <button onclick="redirectToSignUp()" class="font-bold text-indigo-600 hover:text-indigo-800 cursor-pointer">
                        {{ __('Sign up here') }}
                    </button>
                </p>
            </div>
        </div>
    </div>

    <script>
        function redirectToSignUp() {
            let container = document.getElementById('container');
            container.classList.add('sign-up');
            container.classList.remove('sign-in');
            setTimeout(() => {
                window.location.href = "{{ route('register') }}";
            }, 1000); // 1 second delay to allow transition
        }
    </script>
</x-guest-layout>
