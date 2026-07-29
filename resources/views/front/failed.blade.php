<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Failed - KeyVault</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased min-h-screen flex items-center justify-center p-4">

    <!-- Card Container -->
    <div class="bg-white p-8 md:p-12 rounded-[2rem] shadow-xl shadow-gray-200/50 border border-gray-100 max-w-md w-full text-center relative overflow-hidden">

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-40 h-40 bg-red-400/10 blur-3xl rounded-full pointer-events-none"></div>

        <div class="relative mx-auto w-24 h-24 bg-red-50 border-[6px] border-red-500 rounded-full flex items-center justify-center mb-8">
            <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M18 6L6 18M6 6l12 12"></path>
            </svg>
        </div>

        <h1 class="text-4xl font-black text-gray-900 mb-4 tracking-tight">Failed</h1>

        <p class="text-gray-500 font-medium mb-10 text-sm md:text-base leading-relaxed px-4">
            Your payment was failed and your order is cancelled.
        </p>

        <a href="/" class="block w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-purple-600/30 hover:scale-[1.02] active:scale-[0.98]">
            Back to Home
        </a>

    </div>

</body>
</html>
