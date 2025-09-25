<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg m-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Welcome, {{ Auth::guard('guest')->user()->first_name }}!</h2>
        <p class="text-gray-600 mb-6">You are now logged in to the guest portal.</p>
        
        <p class="text-gray-500 text-sm">Your email: {{ Auth::guard('guest')->user()->email }}</p>
        
        <form action="{{ route('guest.logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Log Out
            </button>
        </form>
    </div>
</body>
</html>
