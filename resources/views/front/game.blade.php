@extends('layouts.front')
@section('title', $game->title . ' - KeyVault')

@section('content')
<div class="bg-gray-50/50 h-full py-8 md:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Back Button -->
        <a href="{{ url('/#catalogue') }}" class="inline-flex py-4 items-center gap-2 text-sm font-semibold text-gray-600 hover:text-purple-700 transition-colors mb-8 group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to Catalogue
        </a>

        <!-- Main -->
        <div class="grid grid-cols-1 py-4 md:py-10 lg:grid-cols-12 gap-10 lg:gap-16 items-start">

            <!--Game Cover Image -->
            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-gray-200 aspect-[16/9] md:aspect-[4/3] lg:aspect-auto">
                    <img src="{{ $game->image ? asset('storage/' . $game->image) : 'https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1200' }}"
                        alt="{{$game->title}}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 ease-in-out">
                </div>
            </div>

            <!--Product Details -->
            <div class="lg:col-span-5 flex flex-col h-full justify-center">

                @if($game->stock > 0)
                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-extrabold tracking-wider uppercase mb-4 w-max">
                        In Stock ({{ $game->stock }})
                    </span>
                @else
                    <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-extrabold tracking-wider uppercase mb-4 w-max">
                        Out of Stock
                    </span>
                @endif

                <!-- Title & Price -->
                <h1 class="text-2xl md:text-5xl font-black text-gray-900 tracking-tight mb-2">
                    {{ $game->title }}
                </h1>
                <div class="text-2xl md:text-2xl font-black text-purple-700 mb-6 tracking-tighter">
                    Rp {{ number_format($game->price, 0, ',', '.') }}
                </div>

                <!-- Description -->
                <p class="text-gray-600 md:py-5 py-5 leading-relaxed md:text-lg mb-8">
                    {{ $game->description }}
                </p>

                <!-- Game Details -->
                <div class="grid grid-cols-2 gap-6 border-t border-gray-200 pt-8 mb-8">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Platform</p>
                        <div class="flex items-center gap-2 text-gray-900 font-medium">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            PC / Steam
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Release Date</p>
                        <div class="flex items-center gap-2 text-gray-900 font-medium">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            July 2026
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mt-auto pt-4">
                    @if($game->stock > 0)
                        <a href="{{ route('checkout', $game->id) }}" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 px-8 rounded-2xl shadow-lg shadow-purple-600/30 transition-all hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 text-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Order Now
                        </a>
                    @else
                        <button disabled class="w-full bg-gray-300 text-gray-500 font-bold py-4 px-8 rounded-2xl cursor-not-allowed flex items-center justify-center gap-3 text-lg">
                            Out of Stock
                        </button>
                    @endif

                    <div class="flex items-center justify-center gap-2 mt-4 text-sm font-medium text-gray-500">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Instant Digital Delivery
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
