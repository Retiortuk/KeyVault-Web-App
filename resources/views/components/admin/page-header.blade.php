@props(['title', 'subtitle' => null])

<div class="mb-8 bg-white p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">{{ $title }}</h2>
        @if($subtitle)
            <p class="text-gray-500 mt-1">{{ $subtitle }}</p>
        @endif
    </div>

    @if($slot->isNotEmpty())
        <div class="flex items-center gap-3 w-full md:w-auto">
            {{ $slot }}
        </div>
    @endif
</div>
