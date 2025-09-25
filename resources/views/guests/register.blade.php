<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md m-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Guest Registration</h2>
        
        <form action="{{ route('guest.register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('first_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('last_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone (Optional)</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth (Optional)</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Register
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Already have an account? 
            <a href="{{ route('guest.login.form') }}" class="font-medium text-blue-600 hover:text-blue-500 ml-1">Log In</a>
        </div>
    </div>
</body>
</html>
