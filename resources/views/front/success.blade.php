<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful - KeyVault</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased min-h-screen flex items-center justify-center p-4">

    <!-- Card Container -->
    <div class="bg-white p-8 md:p-12 rounded-[2rem] shadow-xl shadow-gray-200/50 border border-gray-100 max-w-lg w-full text-center relative overflow-hidden">

        <!-- Efek Glow di belakang Checkmark (Opsional untuk estetika) -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-40 h-40 bg-green-400/20 blur-3xl rounded-full"></div>

        <!-- Success Checkmark Icon -->
        <div class="relative mx-auto w-24 h-24 bg-green-50 border-[6px] border-green-500 rounded-full flex items-center justify-center mb-8">
            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </div>

        <!-- information -->
        <h1 class="text-4xl font-black text-gray-900 mb-3 tracking-tight">Thank You!</h1>
        <p class="text-gray-500 font-medium mb-8 text-sm md:text-base">
            Your payment was successful and your order is complete.
        </p>

        <p class="text-sm font-bold text-gray-800 mb-6 leading-relaxed px-2">
            We sent your key to your email as your archive, you can't access this page after you closed it.
        </p>

        <p class="text-xs text-gray-500 mb-4 font-medium">
            Didn't receive a key? Contact our admin <a href="#contact" class="text-gray-800 font-bold underline hover:text-purple-600 transition-colors">here</a>
        </p>

        <!-- License Copy to Clipboard) -->
        <div class="bg-purple-50 rounded-2xl p-5 md:p-6 mb-8 border border-purple-100 relative group">

            <div class="flex items-center justify-center gap-2 text-purple-700 font-black text-xs uppercase tracking-widest mb-4">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C9.243 2 7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7zm7.002 13H7.998C7.446 20 7 19.555 7 19v-8c0-.555.446-1 .998-1h8.004c.552 0 1.002.445 1.002 1v8c0 .555-.45 1-1.002 1z"></path><circle cx="12" cy="15" r="1.5"></circle></svg>
                License Vault
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-1 flex justify-between items-center shadow-sm">
                <!-- dynamic data's Controller -->
                <input type="text" id="license-key" readonly value="{{ $transaction->gameKey->license_key ?? 'Key not available' }}" class="w-full bg-transparent font-mono text-gray-800 font-bold tracking-[0.2em] text-sm md:text-base px-4 py-3 outline-none text-center selection:bg-purple-200">

                <button id="copy-btn" class="shrink-0 p-3 bg-gray-50 hover:bg-purple-100 text-gray-500 hover:text-purple-700 rounded-lg transition-colors border border-gray-100 focus:ring-2 focus:ring-purple-500" title="Copy to clipboard">
                    <svg id="copy-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <svg id="check-icon" class="w-5 h-5 hidden text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </button>
            </div>

            <div id="copy-toast" class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-xs font-bold py-1.5 px-3 rounded-lg opacity-0 transition-opacity duration-300 pointer-events-none">
                Copied!
            </div>
        </div>

        <a href="/" class="block w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-purple-600/30 hover:scale-[1.02] active:scale-[0.98]">
            Back to Home
        </a>

    </div>
</body>
</html>
