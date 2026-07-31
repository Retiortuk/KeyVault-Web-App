<nav class="bg-white sticky top-0 z-50 border-b border-gray-100 shadow-sm/50 transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <div class="flex items-center gap-2">
                <svg class="w-6 h-6" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#f78282" stroke="#f78282"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>game_controller [#794]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-220.000000, -4719.000000)" fill="#9810fa"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M168.169,4570 L166,4570 L166,4568 L168.169,4568 L169.169,4569 L168.169,4570 Z M170.588,4567.581 L170.583,4567.586 L168.997,4566 L165.997,4566 L164,4566 L164,4572 L165.997,4572 L168.997,4572 L172.003,4568.995 L170.588,4567.581 Z M182,4570 L179.831,4570 L178.831,4569 L179.831,4568 L182,4568 L182,4570 Z M182.003,4566 L179.003,4566 L175.997,4569.005 L177.412,4570.419 L177.417,4570.414 L179.003,4572 L182.003,4572 L184,4572 L184,4566 L182.003,4566 Z M175,4574.834 L175,4577 L173,4577 L173,4574.834 L174,4573.834 L175,4574.834 Z M172.583,4572.414 L172.587,4572.419 L171,4574.005 L171,4577.005 L171,4579 L177,4579 L177,4577.005 L177,4574.005 L173.996,4571 L172.583,4572.414 Z M173,4563.172 L173,4561 L175,4561 L175,4563.172 L174,4564.172 L173,4563.172 Z M175.422,4565.591 L175.416,4565.586 L177,4564 L177,4561 L177,4559 L171,4559 L171,4561 L171,4564 L174.006,4567.005 L175.422,4565.591 Z" id="game_controller-[#794]"> </path> </g> </g> </g> </g></svg>
                <a href="/" class="text-2xl font-black text-purple-700 tracking-tight">KeyVault</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-10 h-full">
                <a href="{{ request()->is('/') ? '#featured' : url('/#featured') }}" class="desktop-nav-link inline-flex items-center px-1 border-b-2 border-transparent text-sm font-semibold text-gray-500 hover:text-gray-900 hover:border-gray-300 h-full transition-colors">
                    Featured
                </a>
                <a href="{{ request()->is('/') ? '#catalogue' : url('/#catalogue') }}" class="desktop-nav-link inline-flex items-center px-1 border-b-2 border-transparent text-sm font-semibold text-gray-500 hover:text-gray-900 hover:border-gray-300 h-full transition-colors">
                    Catalogue
                </a>
                <a href="{{ request()->is('/') ? '#how-it-works' : url('/#how-it-works') }}" class="desktop-nav-link inline-flex items-center px-1 border-b-2 border-transparent text-sm font-semibold text-gray-500 hover:text-gray-900 hover:border-gray-300 h-full transition-colors">
                    How it Works?
                </a>
                <a href="{{ request()->is('/') ? '#support' : url('/#support') }}" class="desktop-nav-link inline-flex items-center px-1 border-b-2 border-transparent text-sm font-semibold text-gray-500 hover:text-gray-900 hover:border-gray-300 h-full transition-colors">
                    Support
                </a>
            </div>

            <div class="flex items-center md:hidden">
                <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="text-gray-500 hover:text-purple-600 focus:outline-none p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white">
        <div class="px-4 pt-2 pb-4 space-y-1 shadow-lg">
            <a href="#featured" class="block px-3 py-2.5 rounded-xl text-base font-bold text-purple-700 bg-purple-50">Featured</a>
            <a href="#catalogue" class="block px-3 py-2.5 rounded-xl text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-colors">Catalogue</a>
            <a href="#how-it-works" class="block px-3 py-2.5 rounded-xl text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-colors">How it Works</a>
            <a href="#support" class="block px-3 py-2.5 rounded-xl text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-colors">Support</a>
        </div>
    </div>
</nav>
