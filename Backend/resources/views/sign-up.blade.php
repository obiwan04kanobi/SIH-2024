<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div id="container" class="container sign-up">
        <div class="row">
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <h2>Student Register</h2>
                        <form id="registerForm" action="{{ route('verify.otp') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bx-mail-send'></i>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="phone" name="phone" placeholder="Phone No." required>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <button type="button" id="sendOtpBtn" onclick="sendOtp()">Send OTP</button>

                            <div id="otpSection" style="display:none;">
                                <div class="input-group">
                                    <i class='bx bxs-lock-alt'></i>
                                    <input type="text" id="otp" name="otp" placeholder="Enter OTP"
                                        required>
                                </div>
                                <button type="submit">Sign up</button>
                            </div>
                            <p>
                                <span>Already have an account?</span>
                                <b onclick="redirectToSignIn()" class="pointer">Sign in here</b>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendOtp() {
            const form = document.getElementById('registerForm');
            const otpSection = document.getElementById('otpSection');
            const sendOtpBtn = document.getElementById('sendOtpBtn');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const formData = {
                name: form.name.value,
                email: form.email.value,
                phone: form.phone.value,
                password: form.password.value
            };

            console.log('Form data being sent:', formData); // Add this line

            fetch("{{ route('send.otp') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        otpSection.style.display = 'block';
                        sendOtpBtn.style.display = 'none'; // Hide the Send OTP button
                    } else {
                        alert(data.message || 'Error sending OTP');
                    }
                })
                .catch(error => console.error('Error:', error));
        }


        function redirectToSignIn() {
            let container = document.getElementById('container');
            container.classList.add('sign-in');
            container.classList.remove('sign-up');
            setTimeout(() => {
                window.location.href = "{{ route('login') }}";
            }, 1000); // 1 second delay to allow transition
        }
    </script>
</body>

</html>
