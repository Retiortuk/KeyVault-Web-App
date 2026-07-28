@extends('layouts.admin')
@section('title', 'Key Management')

@section('content')
<!-- Header Section -->
<x-admin.page-header title="Key Management" subtitle="Manage game license keys inventory and availability.">
    <button onclick="toggleModal('modal-add-key')" class="w-full md:w-auto bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-xl transition-colors shadow-md shadow-purple-200 flex items-center justify-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New Keys
    </button>
</x-admin.page-header>

<!-- Main Table Card -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">

    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/30">
        @if($gamesWithKeys->total() > 0)
            <p class="text-sm text-gray-500 font-medium">
                Showing <span class="font-bold text-gray-900">{{ $gamesWithKeys->firstItem() }}-{{ $gamesWithKeys->lastItem() }}</span> of <span class="font-bold text-gray-900">{{ $gamesWithKeys->total() }}</span> Games with Keys
            </p>
        @else
            <p class="text-sm text-red-500 font-medium">No license keys available in inventory.</p>
        @endif
    </div>

    <!-- Main Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50/80 text-gray-700 font-bold text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4">Game</th>
                    <th class="px-6 py-4">Total Keys</th>
                    <th class="px-6 py-4">Available</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($gamesWithKeys as $game)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-12 rounded-lg overflow-hidden bg-gray-200 shrink-0">
                                    <img src="{{ $game->image ? asset('storage/' . $game->image) : 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=100&h=120&fit=crop' }}" class="w-full h-full object-cover">
                                </div>
                                <p class="font-bold text-gray-900">{{ $game->title }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono font-medium text-gray-900">
                            {{ $game->total_keys }} Keys
                        </td>
                        <td class="px-6 py-4">
                            @if($game->available_keys > 0)
                                <span class="bg-green-100 text-green-700 px-3 py-1.5 rounded-lg text-xs font-bold tracking-wider uppercase shadow-sm">
                                    {{ $game->available_keys }} Ready
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1.5 rounded-lg text-xs font-bold tracking-wider uppercase shadow-sm">
                                    Out of Stock
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="toggleModal('modal-view-keys-{{ $game->id }}')" class="bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold py-2 px-4 rounded-lg transition-colors inline-flex items-center gap-2 text-xs uppercase tracking-wider">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                View Keys
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">No Keys Found</h3>
                                <p class="text-gray-500 text-sm">Upload license keys using the "Add New Keys" button.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($gamesWithKeys->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
            {{ $gamesWithKeys->links() }}
        </div>
    @endif
</div>


<x-admin.modal id="modal-add-key" title="Add New License Keys" subtitle="You can insert multiple keys at once by pressing Enter.">
    <form action="{{ route('admin.keys.store') }}" method="POST">
        @csrf
        <div class="px-6 py-5 space-y-5">
            <!-- Game Selection Dropdown -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Select Game</label>
                <select required name="game_id" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all cursor-pointer">
                    <option value="" disabled selected>-- Choose a Game --</option>
                    @foreach($allGames as $game)
                        <option value="{{ $game->id }}">{{ $game->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Keys Textarea -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">License Keys (One per line)</label>
                <textarea required name="keys" rows="8" placeholder="XXXX-YYYY-ZZZZ&#10;AAAA-BBBB-CCCC&#10;1111-2222-3333" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 font-mono text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all resize-none leading-relaxed"></textarea>
            </div>
        </div>

        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-end gap-3">
            <button type="button" onclick="toggleModal('modal-add-key')" class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">Cancel</button>
            <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-purple-600 rounded-xl hover:bg-purple-700 shadow-md shadow-purple-200 transition-colors">Import Keys</button>
        </div>
    </form>
</x-admin.modal>


@foreach ($gamesWithKeys as $game)
<x-admin.modal id="modal-view-keys-{{ $game->id }}" title="License Keys" subtitle="{{ $game->title }}">
    <div class="px-6 py-5 max-h-[60vh] overflow-y-auto">

        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50/80 text-gray-700 font-bold text-xs uppercase tracking-wider sticky top-0 shadow-sm z-10">
                <tr>
                    <th class="px-4 py-3 rounded-tl-lg">Key Code</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-right rounded-tr-lg">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($game->keys as $item)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 py-3">
                            <code class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded font-mono text-xs border border-gray-200 tracking-wider">
                                {{ $item->license_key }}
                            </code>
                        </td>
                        <td class="px-4 py-3">
                            @if($item->is_used)
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-[10px] font-bold tracking-wider uppercase">Used</span>
                            @else
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-[10px] font-bold tracking-wider uppercase">Available</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right">
                            <form action="{{ route('admin.keys.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus license key ini secara permanen?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors" title="Delete Key">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-end">
        <button type="button" onclick="toggleModal('modal-view-keys-{{ $game->id }}')" class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">Close Panel</button>
    </div>
</x-admin.modal>
@endforeach

@endsection
