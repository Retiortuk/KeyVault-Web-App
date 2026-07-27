@extends('layouts.admin')
@section('title', 'Keys Management')

@section('content')
<div class="mb-8 bg-white p-8 rounded-2xl border border-gray-100 shadow-sm flex justify-between items-center">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Keys Management</h2>
        <p class="text-gray-500 mt-1">Provision and monitor game license keys.</p>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <!-- Left: Form Input Keys -->
    <div class="xl:col-span-1">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2 mb-6">
                <span class="text-purple-600 border-2 border-purple-600 rounded-full w-5 h-5 flex items-center justify-center text-xs">+</span> Add New Keys
            </h3>

            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Select Game</label>
                    <select class="w-full border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all">
                        <option>Choose a title...</option>
                        <option>Cyberpunk 2077</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Batch License Keys (One per line)</label>
                    <textarea rows="6" placeholder="XXXX-XXXX-XXXX-XXXX&#10;YYYY-YYYY-YYYY-YYYY" class="w-full border-gray-200 rounded-xl bg-gray-50 px-4 py-3 text-sm font-mono focus:ring-2 focus:ring-purple-600 focus:border-transparent outline-none transition-all resize-none"></textarea>
                </div>
                <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-4 rounded-xl transition-colors flex items-center justify-center gap-2 shadow-md shadow-purple-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Save Keys
                </button>
            </form>
        </div>
    </div>

    <!-- Right: Inventory Table -->
    <div class="xl:col-span-2">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col h-full">
            <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Key Inventory Overview
                </h3>
                <button class="text-sm font-medium text-gray-600 border border-gray-200 rounded-lg px-4 py-2 hover:bg-gray-50">All Status</button>
            </div>

            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50/50 text-gray-400 font-semibold text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Game Title</th>
                            <th class="px-6 py-4">Total Stock (Keys)</th>
                            <th class="px-6 py-4">Availability</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-900">Cyber Strike 2077</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-lg text-gray-900">142</span> <span class="text-gray-500 font-medium">Keys</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-teal-100 text-teal-700 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider">In Stock</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <!-- Tombol View yang akan memanggil Modal -->
                                <button onclick="toggleModal('modal-manage-keys')" class="bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold py-2 px-4 rounded-lg transition-colors inline-flex items-center gap-2 text-xs uppercase tracking-wider">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    View / Edit
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-900">Elden Realm</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-lg text-red-600">0</span> <span class="text-gray-500 font-medium">Keys</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider">Sold Out</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button onclick="toggleModal('modal-manage-keys')" class="bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold py-2 px-4 rounded-lg transition-colors inline-flex items-center gap-2 text-xs uppercase tracking-wider">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    View / Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Managing Keys -->
<div id="modal-manage-keys" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop Blur -->
    <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="toggleModal('modal-manage-keys')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal Panel -->
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-gray-100">

                <!-- Modal Header -->
                <div class="bg-white px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900" id="modal-title">Manage Keys</h3>
                        <p class="text-sm text-gray-500 mt-1">Cyber Strike 2077</p>
                    </div>
                    <button onclick="toggleModal('modal-manage-keys')" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Modal Body (List of Keys) -->
                <div class="px-6 py-4 max-h-[50vh] overflow-y-auto bg-gray-50/50 space-y-3">

                    <!-- Row Key 1 (Unused - Editable) -->
                    <div class="flex items-center gap-3 bg-white p-3 rounded-xl border border-gray-200 shadow-sm">
                        <input type="text" value="CYBR-9A8B-7C6D-5E4F" class="flex-1 border-none bg-transparent font-mono text-sm focus:ring-0 focus:outline-none text-gray-900">
                        <span class="bg-teal-100 text-teal-700 px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider">Unused</span>
                        <button class="text-red-500 hover:bg-red-50 p-2 rounded-lg transition-colors" title="Delete Key">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>

                    <!-- Row Key 2 (Used - Readonly) -->
                    <div class="flex items-center gap-3 bg-gray-100 p-3 rounded-xl border border-gray-200 opacity-75">
                        <input type="text" value="CYBR-1122-3344-5566" class="flex-1 border-none bg-transparent font-mono text-sm text-gray-500 focus:outline-none cursor-not-allowed" readonly>
                        <span class="bg-gray-200 text-gray-600 px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider">Used</span>
                        <button class="text-gray-400 cursor-not-allowed p-2 rounded-lg" disabled title="Cannot delete used key">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="bg-white px-6 py-4 border-t border-gray-100 flex justify-end gap-3">
                    <button type="button" onclick="toggleModal('modal-manage-keys')" class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="button" onclick="toggleModal('modal-manage-keys')" class="px-5 py-2.5 text-sm font-semibold text-white bg-purple-600 rounded-xl hover:bg-purple-700 shadow-md shadow-purple-200 transition-colors">
                        Save Changes
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // Function for Modal Toggle
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
