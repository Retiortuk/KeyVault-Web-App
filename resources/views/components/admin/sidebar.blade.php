<aside class="fixed inset-y-0 left-0 bg-white shadow-sm border-r border-gray-100 w-64 flex flex-col justify-between z-20">
    <div>
        <!-- Logo -->
        <div class="h-20 flex items-center px-8 border-b border-gray-50">
            <div class="flex items-center gap-2 text-purple-700">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 0 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path></svg>
                <div>
                    <h1 class="font-bold text-xl leading-tight">KeyVault</h1>
                    <p class="text-[0.6rem] font-semibold text-gray-400 tracking-widest uppercase">Enterprise Control</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-6 px-4 space-y-2">
            @php
                $navItems = [
                    ['name' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
                    ['name' => 'Game Management', 'route' => 'admin.games.index', 'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
                    ['name' => 'Key Management', 'route' => 'admin.keys.index', 'icon' => 'M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z'],
                    ['name' => 'Transaction History', 'route' => 'admin.transactions.index', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ];
            @endphp

            @foreach($navItems as $item)
                <a href="{{ route($item['route']) }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium text-sm {{ request()->routeIs($item['route']) ? 'bg-purple-600 text-white shadow-md shadow-purple-200' : 'text-gray-500 hover:bg-gray-50 hover:text-purple-600' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path></svg>
                    {{ $item['name'] }}
                </a>
            @endforeach
        </nav>
    </div>

    <!-- Bottom Actions -->
    <div class="p-4 border-t border-gray-100 space-y-2">
        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm font-medium text-gray-500 rounded-xl hover:bg-red-50 hover:text-red-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            Logout
        </a>
    </div>
</aside>
