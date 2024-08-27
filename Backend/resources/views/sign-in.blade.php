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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div id="container" class="container sign-in">
        <div class="row">
            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-in">
                        <h2>Student Login</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" name="password" placeholder="Password" required>
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
