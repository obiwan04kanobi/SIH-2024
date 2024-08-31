<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aadhaar Number Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-cyan-500 to-blue-700 flex items-center justify-center h-screen m-0">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-8 text-center">
        <h1 class="text-blue-700 mb-6 text-2xl font-semibold">Sign In to your account</h1>
        
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('aadhar-login') }}">
            @csrf
            <div class="form-group mb-8">
                <label for="aadhar" class="block mb-3 text-lg text-gray-800">Enter your Aadhaar number:</label>
                <input type="text" id="aadhar" name="aadhar" placeholder="Enter Aadhaar Number" maxlength="12" class="w-full p-4 border-2 border-blue-700 rounded-lg text-lg text-gray-800 focus:outline-none focus:border-blue-900 focus:shadow-md">
            </div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 active:bg-green-800 text-white py-4 px-6 rounded-lg text-xl w-full transition-colors duration-300 ease-in-out">
                Next
            </button>
        </form>
    </div>
</body>

</html>
