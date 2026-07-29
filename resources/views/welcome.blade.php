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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @php
                $dummyGames = [
                    ['title' => 'Elden Ring', 'price' => 'Rp 599.000', 'category' => 'RPG', 'image' => 'https://images.unsplash.com/photo-1605901309584-818e25960b8f?q=80&w=600'],
                    ['title' => 'God of War Ragnarök', 'price' => 'Rp 879.000', 'category' => 'ACTION', 'image' => 'https://images.unsplash.com/photo-1585620385456-4759f9b5c7d9?q=80&w=600'],
                    ['title' => 'Modern Warfare III', 'price' => 'Rp 1.050.000', 'category' => 'FPS', 'image' => 'https://images.unsplash.com/photo-1603953715392-747d86f7f2b1?q=80&w=600'],
                    ['title' => 'Starfield', 'price' => 'Rp 759.000', 'category' => 'RPG', 'image' => 'https://images.unsplash.com/photo-1614729939124-032f0b56c9ce?q=80&w=600'],

                    ['title' => 'Elden Ring', 'price' => 'Rp 599.000', 'category' => 'RPG', 'image' => 'https://images.unsplash.com/photo-1605901309584-818e25960b8f?q=80&w=600'],
                    ['title' => 'God of War Ragnarök', 'price' => 'Rp 879.000', 'category' => 'ACTION', 'image' => 'https://images.unsplash.com/photo-1585620385456-4759f9b5c7d9?q=80&w=600'],
                    ['title' => 'Modern Warfare III', 'price' => 'Rp 1.050.000', 'category' => 'FPS', 'image' => 'https://images.unsplash.com/photo-1603953715392-747d86f7f2b1?q=80&w=600'],
                    ['title' => 'Starfield', 'price' => 'Rp 759.000', 'category' => 'RPG', 'image' => 'https://images.unsplash.com/photo-1614729939124-032f0b56c9ce?q=80&w=600'],
                ];
            @endphp

            @foreach($dummyGames as $game)
                <x-front.game-card
                    title="{{ $game['title'] }}"
                    price="{{ $game['price'] }}"
                    category="{{ $game['category'] }}"
                    image="{{ $game['image'] }}"
                />
            @endforeach
        </div>

    </section>

@endsection
