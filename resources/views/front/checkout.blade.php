@extends('layouts.front')
@section('title', 'Secure Checkout - KeyVault')

@section('content')
<div class="bg-gray-50/50 py-10 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Checkout -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
            <div>
                <h1 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight">Secure Checkout</h1>
                <p class="text-gray-500 mt-2 font-medium">Complete your purchase to receive your key instantly.</p>
            </div>
            <a href="{{route('game.show', $game->id)}}" class="inline-flex items-center gap-2 text-sm font-bold text-purple-700 hover:text-purple-800 transition-colors group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Return to Catalogue
            </a>
        </div>

        <form action="{{ route('checkout.process', $game->id) }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            @csrf

            <!-- Detail Form -->
            <div class="lg:col-span-7 space-y-6">

                <!--Customer Details -->
                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <h2 class="text-xl font-bold text-gray-900">Customer Details</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">First Name</label>
                            <input type="text" name="first_name" required placeholder="Jane" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all placeholder-gray-400 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Last Name</label>
                            <input type="text" name="last_name" required placeholder="Doe" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all placeholder-gray-400 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-2">Email Address (for key delivery)</label>
                        <input type="email" name="email" required placeholder="jane.doe@example.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all placeholder-gray-400 text-sm">
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                        <h2 class="text-xl font-bold text-gray-900">Payment Method</h2>
                    </div>

                    <label class="relative flex items-center justify-between p-4 border-2 border-purple-600 bg-purple-50/30 rounded-2xl cursor-pointer">
                        <div class="flex items-center gap-4">
                            <input type="radio" name="payment_method" value="qris" checked class="w-5 h-5 text-purple-600 border-gray-300 focus:ring-purple-600">
                            <div>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_QRIS.svg" alt="QRIS Logo" class="h-8 object-contain">
                                <p class="text-[10px] text-gray-500 mt-1 font-medium">QR Code Standar Pembayaran Nasional</p>
                            </div>
                        </div>
                    </label>
                </div>

            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-5 lg:sticky lg:top-28">
                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-lg shadow-gray-200/40 border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>

                    <!-- Item Detail -->
                    <div class="flex items-center justify-between gap-4 pb-6 border-b border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-24 h-34 bg-gray-100 rounded-xl overflow-hidden shrink-0 border border-gray-200">
                                <img src="{{ $game->image ? asset('storage/' . $game->image) : 'https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=200' }}" alt="title-game" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-sm md:text-base leading-tight">{{$game->title}}</h3>
                                <p class="text-xs text-gray-500 mt-0.5 font-medium">Global Steam Key</p>
                            </div>
                        </div>
                        <div class="font-bold text-gray-900 text-sm md:text-base whitespace-nowrap">
                            Rp {{ number_format($game->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <!-- Pricing Calculation -->
                    <div class="py-6 space-y-3 border-b border-gray-100">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500 font-medium">Subtotal</span>
                            <span class="text-gray-900 font-semibold">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500 font-medium">Service Fee</span>
                            <span class="text-gray-900 font-semibold">Rp 0</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="py-6 flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-2xl font-black text-purple-700 tracking-tight">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 px-4 rounded-xl transition-all shadow-md shadow-purple-200 hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Confirm Payment
                    </button>

                    <!-- Trust Badge -->
                    <div class="mt-5 flex items-center justify-center gap-1.5 text-xs font-semibold text-gray-500">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        256-bit SSL Secure Checkout
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
