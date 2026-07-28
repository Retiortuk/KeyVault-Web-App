<aside class="fixed inset-y-0 left-0 bg-white shadow-sm border-r border-gray-100 w-64 flex flex-col justify-between z-20">
    <div>
        <!-- Logo -->
        <div class="h-20 flex items-center px-8 border-b border-gray-50">
            <div class="flex items-center gap-2 text-purple-700">
                <svg class="w-6 h-6" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#f78282" stroke="#f78282"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>game_controller [#794]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-220.000000, -4719.000000)" fill="#9810fa"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M168.169,4570 L166,4570 L166,4568 L168.169,4568 L169.169,4569 L168.169,4570 Z M170.588,4567.581 L170.583,4567.586 L168.997,4566 L165.997,4566 L164,4566 L164,4572 L165.997,4572 L168.997,4572 L172.003,4568.995 L170.588,4567.581 Z M182,4570 L179.831,4570 L178.831,4569 L179.831,4568 L182,4568 L182,4570 Z M182.003,4566 L179.003,4566 L175.997,4569.005 L177.412,4570.419 L177.417,4570.414 L179.003,4572 L182.003,4572 L184,4572 L184,4566 L182.003,4566 Z M175,4574.834 L175,4577 L173,4577 L173,4574.834 L174,4573.834 L175,4574.834 Z M172.583,4572.414 L172.587,4572.419 L171,4574.005 L171,4577.005 L171,4579 L177,4579 L177,4577.005 L177,4574.005 L173.996,4571 L172.583,4572.414 Z M173,4563.172 L173,4561 L175,4561 L175,4563.172 L174,4564.172 L173,4563.172 Z M175.422,4565.591 L175.416,4565.586 L177,4564 L177,4561 L177,4559 L171,4559 L171,4561 L171,4564 L174.006,4567.005 L175.422,4565.591 Z" id="game_controller-[#794]"> </path> </g> </g> </g> </g></svg>
                <div>
                    <h1 class="font-bold text-xl leading-tight">KeyVault</h1>
                    <p class="text-[0.6rem] font-semibold text-gray-400 tracking-widest uppercase">Game Enterprise</p>
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
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-gray-500 rounded-xl hover:bg-red-50 hover:text-red-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </button>
        </form>
    </div>
</aside>
