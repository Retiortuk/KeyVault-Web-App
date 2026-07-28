<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - KeyVault Admin</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f9fafb; }
    </style>
</head>
<body class="text-gray-800 antialiased">
    <x-admin.sidebar />

    <x-admin.toast />

    <main class="ml-64 min-h-screen flex flex-col">
        <x-admin.topbar />
        <div class="p-8 flex-1">
            @yield('content')
        </div>
    </main>
</body>
</html>
