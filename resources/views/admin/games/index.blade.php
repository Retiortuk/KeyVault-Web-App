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

    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/30">
        <div class="relative w-96">
            <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Cari judul game..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg bg-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all shadow-sm">
        </div>
        <p class="text-sm text-gray-500 font-medium">Menampilkan 1-3 dari 124 Game</p>
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

                <!-- Row 1 -->
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="w-16 h-20 rounded-lg overflow-hidden shadow-sm bg-gray-200 border border-gray-100">
                            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=200&h=250&fit=crop" alt="Cyberpunk 2077" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-gray-900 text-base mb-1.5">Cyberpunk 2077</p>
                        <span class="bg-cyan-100 text-cyan-700 px-2.5 py-1 rounded text-[10px] font-bold tracking-wider uppercase">PC / STEAM</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500 w-1/3">
                        <p class="line-clamp-2 leading-relaxed">Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification.</p>
                    </td>
                    <td class="px-6 py-4 font-mono font-semibold text-gray-900">Rp 699.999</td>
                    <td class="px-6 py-4 text-right">
                        <!-- Tombol View / Edit untuk memanggil Modal Edit -->
                        <button onclick="toggleModal('modal-edit-game')" class="bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold py-2 px-4 rounded-lg transition-colors inline-flex items-center gap-2 text-xs uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            View / Edit
                        </button>
                    </td>
                </tr>

                <!-- Row 2 -->
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="w-16 h-20 rounded-lg overflow-hidden shadow-sm bg-gray-200 border border-gray-100">
                            <img src="https://images.unsplash.com/photo-1605901309584-818e25960b8f?w=200&h=250&fit=crop" alt="Elden Ring" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-gray-900 text-base mb-1.5">Elden Ring</p>
                        <span class="bg-cyan-100 text-cyan-700 px-2.5 py-1 rounded text-[10px] font-bold tracking-wider uppercase">PC / STEAM</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500 w-1/3">
                        <p class="line-clamp-2 leading-relaxed">Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.</p>
                    </td>
                    <td class="px-6 py-4 font-mono font-semibold text-gray-900">Rp 599.000</td>
                    <td class="px-6 py-4 text-right">
                        <button onclick="toggleModal('modal-edit-game')" class="bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold py-2 px-4 rounded-lg transition-colors inline-flex items-center gap-2 text-xs uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            View / Edit
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30 flex justify-between items-center">
        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm text-gray-400 bg-white cursor-not-allowed">Previous</button>
        <div class="flex gap-1">
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-purple-600 text-white font-medium text-sm shadow-md shadow-purple-200 transition-colors">1</button>
        </div>
        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50 font-medium transition-colors">Next</button>
    </div>
</div>


<!-- Component Modal: Add Game -->
<x-admin.modal id="modal-add-game" title="Add New Game">
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="px-6 py-5 space-y-5 max-h-[60vh] overflow-y-auto">
            <!-- Title & Price -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Game Title</label>
                    <input type="text" name="title" placeholder="e.g. Cyberpunk 2077" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Price (IDR)</label>
                    <input type="number" name="price" placeholder="e.g. 699000" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                <textarea name="description" rows="4" placeholder="Brief description of the game..." class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all resize-none"></textarea>
            </div>

            <!-- Cover Image Upload -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Cover Image</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-purple-400 hover:bg-purple-50 transition-colors cursor-pointer relative">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <span class="relative cursor-pointer rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none">
                                <span>Upload a file</span>
                                <input name="image" type="file" class="sr-only">
                            </span>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                    </div>
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


<!-- Component Modal: Edit Game -->
<x-admin.modal id="modal-edit-game" title="Edit Game" subtitle="Cyberpunk 2077">
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-5 space-y-5 max-h-[60vh] overflow-y-auto">
            <!-- Title & Price -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Game Title</label>
                    <input type="text" name="title" value="Cyberpunk 2077" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Price (IDR)</label>
                    <input type="number" name="price" value="699999" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                <textarea name="description" rows="4" class="w-full border border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all resize-none">Cyberpunk 2077 is an open-world, action-adventure story set in Night City...</textarea>
            </div>

            <!-- Current Cover Image Info -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Update Cover Image (Optional)</label>
                <div class="flex items-center gap-4">
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=200&h=250&fit=crop" class="w-16 h-20 rounded-lg object-cover border border-gray-200">
                    <input name="image" type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition-colors cursor-pointer">
                </div>
            </div>
        </div>

        <!-- Footer Form -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-between items-center">
            <button type="button" class="px-5 py-2.5 text-sm font-semibold text-red-600 bg-red-50 rounded-xl hover:bg-red-100 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                Delete Game
            </button>
            <div class="flex gap-3">
                <button type="button" onclick="toggleModal('modal-edit-game')" class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">Cancel</button>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-purple-600 rounded-xl hover:bg-purple-700 shadow-md shadow-purple-200 transition-colors">Save Changes</button>
            </div>
        </div>
    </form>
</x-admin.modal>

<script>
    function toggleModal(modalID) {
        const modal = document.getElementById(modalID);
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
</script>
@endsection
