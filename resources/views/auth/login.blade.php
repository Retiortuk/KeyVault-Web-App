<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - KeyVault</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-purple-100 text-purple-700 mb-4">
                <svg class="1-6 h-6" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#f78282" stroke="#f78282"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>game_controller [#794]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-220.000000, -4719.000000)" fill="#9810fa"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M168.169,4570 L166,4570 L166,4568 L168.169,4568 L169.169,4569 L168.169,4570 Z M170.588,4567.581 L170.583,4567.586 L168.997,4566 L165.997,4566 L164,4566 L164,4572 L165.997,4572 L168.997,4572 L172.003,4568.995 L170.588,4567.581 Z M182,4570 L179.831,4570 L178.831,4569 L179.831,4568 L182,4568 L182,4570 Z M182.003,4566 L179.003,4566 L175.997,4569.005 L177.412,4570.419 L177.417,4570.414 L179.003,4572 L182.003,4572 L184,4572 L184,4566 L182.003,4566 Z M175,4574.834 L175,4577 L173,4577 L173,4574.834 L174,4573.834 L175,4574.834 Z M172.583,4572.414 L172.587,4572.419 L171,4574.005 L171,4577.005 L171,4579 L177,4579 L177,4577.005 L177,4574.005 L173.996,4571 L172.583,4572.414 Z M173,4563.172 L173,4561 L175,4561 L175,4563.172 L174,4564.172 L173,4563.172 Z M175.422,4565.591 L175.416,4565.586 L177,4564 L177,4561 L177,4559 L171,4559 L171,4561 L171,4564 L174.006,4567.005 L175.422,4565.591 Z" id="game_controller-[#794]"> </path> </g> </g> </g> </g></svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">KeyVault</h1>
            <p class="text-sm text-gray-500 mt-1">Sign in to manage KeyVault</p>
        </div>

        @error('email')
            <div class="bg-red-50 border border-red-200 text-red-600 text-sm p-3 rounded-xl mb-6 text-center font-medium">
                {{ $message }}
            </div>
        @enderror

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-md shadow-purple-200 transition-colors mt-2">
                Sign In to Dashboard
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-8">
            Don't have admin access?
            <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 font-semibold transition-colors">Request Account</a>
        </p>
    </div>

</body>
</html>
