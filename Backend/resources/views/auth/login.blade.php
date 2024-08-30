<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>

    <div id="container" class="container sign-in">
        <div class="row">
            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-in">
                        <h2>Student Login</h2>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="email" name="email" placeholder="Email" required autofocus>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                                </label>
                            </div>

                            <button type="submit">Sign in</button>
                            <p><b>Forgot password?</b></p>
                            <p>
                                <span>Don't have an account?</span>
                                <b onclick="redirectToSignUp()" class="pointer">Sign up here</b>
                            </p>
                        </form>
                    </div>
                </div>
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
</body>

</html>
