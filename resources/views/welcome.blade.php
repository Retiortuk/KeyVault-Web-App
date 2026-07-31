@extends('layouts.front')
@section('title', 'KeyVault - Digital Game Store')

@section('content')

    <x-front.hero />

    <section id="catalogue" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <!-- Header -->
        <div class="mb-8 md:mb-10">
            <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-2 tracking-tight">Game Catalogue</h2>
            <p class="text-gray-600 text-base md:text-lg font-medium">Explore our wide range of digital games available for purchase.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @forelse($games as $game)
                <x-front.game-card
                    id="{{ $game->id }}"
                    title="{{ $game->title }}"
                    price="Rp {{ number_format($game->price, 0, ',', '.') }}"
                    category="{{ $game->category }}"
                    image="{{ $game->image ? asset('storage/' . $game->image) : 'https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=600' }}"
                />
            @empty
                <div class="col-span-full py-12 text-center">
                    <p class="text-gray-500 font-medium">No Games Available</p>
                </div>
            @endforelse
        </div>

        @if($games->hasPages())
            <div class="mt-12 md:mt-10 border-t border-gray-100 pt-8">
                {{ $games->links() }}
            </div>
        @endif
    </section>

@endsection
