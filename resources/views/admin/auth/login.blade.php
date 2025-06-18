<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AgriCentral</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="max-w-md w-full bg-white p-6 rounded shadow-md">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/agricentral-logo.png') }}" alt="AgriCentral Logo" class="h-16 object-contain">
        </div>
        <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Admin Login</h2>

        <form method="POST" action="{{ route('admin.login.post') }}" id="loginForm">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" value="{{ old('email') }}">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Login
            </button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address."
                    },
                    password: {
                        required: "Please enter your password.",
                        minlength: "Your password must be at least 6 characters long."
                    }
                },
                errorElement: 'span',
                errorClass: 'text-red-500 text-sm',
                highlight: function (element) {
                    $(element).addClass('border-red-500');
                },
                unhighlight: function (element) {
                    $(element).removeClass('border-red-500');
                }
            });
        });
    </script>

</body>
</html>
