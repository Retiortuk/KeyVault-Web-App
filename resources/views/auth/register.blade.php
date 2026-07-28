<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin - KeyVault</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Setup Admin Account</h1>
            <p class="text-sm text-gray-500 mt-1">Register to manage the store</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-xl border @error('name') border-red-500 @else border-gray-200 @enderror bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-600 outline-none transition-all">
                @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-xl border @error('email') border-red-500 @else border-gray-200 @enderror bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-600 outline-none transition-all">
                @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border @error('password') border-red-500 @else border-gray-200 @enderror bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-600 outline-none transition-all">
                @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-600 outline-none transition-all">
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-md shadow-purple-200 transition-colors mt-4">
                Create Admin Account
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-8">
            Already have access?
            <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-semibold transition-colors">Sign in here</a>
        </p>
    </div>

</body>
</html>
