<x-guest-layout>
    <div class="form sign-up">
        <h2>Student Register</h2>
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <!-- Name -->
            <div class="input-group">
                <i class='bx bxs-user'></i>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Name" required :value="old('name')" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="input-group">
                <i class='bx bx-mail-send'></i>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email" required :value="old('email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" placeholder="Phone No." required :value="old('phone')" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Send OTP Button -->
            <button type="button" id="sendOtpBtn">Send OTP</button>

            <!-- OTP Section (hidden initially) -->
            <div id="otpSection" style="display:none;">
                <div class="input-group">
                    <i class='bx bxs-lock-alt'></i>
                    <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" placeholder="Enter OTP" required />
                    <x-input-error :messages="$errors->get('otp')" class="mt-2" />
                </div>
                <button type="submit">Sign up</button>
            </div>

            <p>
                <span>Already have an account?</span>
                <b onclick="redirectToSignIn()" class="pointer">Sign in here</b>
            </p>
        </form>
    </div>

    <!-- jQuery for AJAX request -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function sendOtp() {
            $.ajax({
                url: '{{ route('sendOtp') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: $('#email').val(),
                },
                success: function(response) {
                    if (response.success) {
                        $('#otpSection').show();
                        $('#sendOtpBtn').hide();
                    } else {
                        alert(response.message);
                    }
                }
            });
        }

        function redirectToSignIn() {
            window.location.href = "{{ route('login') }}";
        }

        // Bind the click event to the button
        $('#sendOtpBtn').click(sendOtp);
    </script>
</x-guest-layout>
