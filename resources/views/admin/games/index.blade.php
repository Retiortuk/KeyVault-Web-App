@extends('layouts.admin')
@section('title', 'Game Management')

@section('content')
<!-- Header Section -->
<div class="mb-8 bg-white p-8 rounded-2xl border border-gray-100 shadow-sm flex justify-between items-center">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Game Management</h2>
        <p class="text-gray-500 mt-1">Manage games catalogue, price, and availability.</p>
    </div>

    <button onclick="toggleModal('modal-add-game')" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-xl transition-colors shadow-md shadow-purple-200 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New Game
    </button>
</div>

<!-- Main Table Card -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">

    <!-- Top Toolbar -->
    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/30">
        @if($games->total() > 0)
            <p class="text-sm text-gray-500 font-medium">
                Showing <span class="font-bold text-gray-900">{{ $games->firstItem() }}-{{ $games->lastItem() }}</span> of <span class="font-bold text-gray-900">{{ $games->total() }}</span> Games
            </p>
        @else
            <p class="text-sm text-red-500 font-medium">No game data available.</p>
        @endif
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50/80 text-gray-700 font-bold text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4">Cover</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Description</th>
                    <th class="px-6 py-4">Price (IDR)</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($games as $game)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="w-16 h-20 rounded-lg overflow-hidden shadow-sm bg-gray-200 border border-gray-100">
                                <img src="{{ $game->image ? asset('storage/' . $game->image) : 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=200&h=250&fit=crop' }}" alt="{{ $game->title }}" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900 text-base mb-1.5">{{ $game->title }}</p>
                            <span class="bg-cyan-100 text-cyan-700 px-2.5 py-1 rounded text-[10px] font-bold tracking-wider uppercase">PC / STEAM</span>
                            <span class="bg-purple-100 text-purple-700 px-2.5 py-1 rounded text-[10px] font-bold tracking-wider uppercase ml-1">
                                Stok: {{ $game->stock ?? 0 }} Keys
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 w-1/3">
                            <p class="line-clamp-2 leading-relaxed">{{ $game->description }}</p>
                        </td>
                        <td class="px-6 py-4 font-mono font-semibold text-gray-900">Rp {{ number_format($game->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="toggleModal('modal-edit-game-{{$game->id}}')" class="bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold py-2 px-4 rounded-lg transition-colors inline-flex items-center gap-2 text-xs uppercase tracking-wider">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                View / Edit
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">No Game Data Available</h3>
                                <p class="text-gray-500 text-sm">Please click the "Add New Game" button and upload an image/data to get started.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($games->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
            {{ $games->links() }}
        </div>
    @endif
</div>


<!-- Component Modal Add Game -->
<x-admin.modal id="modal-add-game" title="Add New Game">
    <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="px-6 py-5 space-y-5 max-h-[60vh] overflow-y-auto">
            <!-- Title & Price -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Game Title</label>
                    <input required type="text" name="title" placeholder="e.g. Cyberpunk 2077" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Price (IDR)</label>
                    <input required type="number" name="price" placeholder="e.g. 699000" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                <textarea required name="description" rows="4" placeholder="Brief description of the game..." class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all resize-none"></textarea>
            </div>

            <!-- Cover Image Upload -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Cover Image</label>
                <div class="flex items-center gap-4">
                    <!-- Preview Image Default -->
                    <img id="preview-add"  class="w-16 h-20 rounded-lg object-cover border border-gray-200 shadow-sm">
                    <input required name="image" type="file" accept="image/*" onchange="document.getElementById('preview-add').src = window.URL.createObjectURL(this.files[0])" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition-colors cursor-pointer">
                </div>
            </div>
        </div>

        <!-- Footer Form -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-end gap-3">
            <button type="button" onclick="toggleModal('modal-add-game')" class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                Cancel
            </button>
            <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-purple-600 rounded-xl hover:bg-purple-700 shadow-md shadow-purple-200 transition-colors">
                Save Game
            </button>
        </div>
    </form>
</x-admin.modal>



<!-- Component Modal Edit Game -->
@foreach ($games as $game)
<x-admin.modal id="modal-edit-game-{{ $game->id }}" title="Edit Game" subtitle="ID: {{ $game->id }}">
    <form id="form-update-{{$game->id}}"  action="{{route('admin.games.update', $game->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-5 space-y-5 max-h-[60vh] overflow-y-auto">
            <!-- Title & Price -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Game Title</label>
                    <input required type="text" name="title" value="{{ $game->title }}" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Price (IDR)</label>
                    <input required type="number" name="price" value="{{ $game->price }}" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                <textarea required name="description" rows="4" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all resize-none">{{ $game->description }}</textarea>
            </div>

            <!-- Current Cover Image Info -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Update Cover Image (Optional)</label>
                <div class="flex items-center gap-4">
                    <img src="{{ $game->image ? asset('storage/' . $game->image) : 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=200&h=250&fit=crop' }}" class="w-16 h-20 rounded-lg object-cover border border-gray-200 shadow-sm">
                    <input name="image" type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition-colors cursor-pointer">
                </div>
            </div>
        </div>
    </form>

    <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-between items-center">
        <form action="{{ route('admin.games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game? All associated license keys will also be deleted!');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-red-600 bg-red-50 rounded-xl hover:bg-red-100 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                Delete Game
            </button>
        </form>

        <div class="flex gap-3">
            <button type="button" onclick="toggleModal('modal-edit-game-{{ $game->id }}')" class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">Cancel</button>
            <button type="submit" form="form-update-{{ $game->id }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-purple-600 rounded-xl hover:bg-purple-700 shadow-md shadow-purple-200 transition-colors">Save Changes</button>
        </div>
    </div>

</x-admin.modal>
@endforeach

@endsection
