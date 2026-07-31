@props(['title', 'image', 'price', 'category', 'id'])

<a href="{{ route('game.show', $id) }}" class="bg-white rounded-2xl border border-gray-100 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] overflow-hidden flex flex-col group hover:shadow-xl hover:border-purple-200 transition-all duration-300 cursor-pointer h-full">

    <!-- Thumbnail -->
    <div class="relative w-full aspect-[3/4] overflow-hidden bg-gray-100">
        <img src="{{ $image }}" alt="{{ $title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">

        <!-- Platform Badge -->
        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur text-gray-800 text-[10px] font-bold px-2 py-1 rounded shadow-sm">
            PC/Steam Sharing
        </div>
    </div>

    <!-- Content -->
    <div class="p-5 flex flex-col flex-grow bg-white">
        <h3 class="font-bold text-gray-900 text-md md:text-lg mb-1.5 line-clamp-1 group-hover:text-purple-700 transition-colors">{{ $title }}</h3>



        <div class="mt-auto flex justify-between items-center pt-3 border-t border-gray-50">
            <span class="text-sm font-bold text-gray-900">{{ $price }}</span>
            <span class="text-sm hidden md:block font-bold text-purple-600 group-hover:text-purple-800 transition-colors">View Details</span>
        </div>
    </div>

</a>
