@extends('layouts.admin')
@section('title', 'Transaction History')

@section('content')
<!-- Header Section -->
<x-admin.page-header
    title="Transaction History"
    subtitle="Monitor and track all customer purchase transactions."
/>

<!-- Main Table Card -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-5 border-b border-gray-100 bg-gray-50/30">
        <button class="flex items-center gap-2 border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
            Filter
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50/80 text-gray-500 font-bold text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4">Order Code</th>
                    <th class="px-6 py-4">Customer Email</th>
                    <th class="px-6 py-4">Game Purchased</th>
                    <th class="px-6 py-4">Assigned Key</th>
                    <th class="px-6 py-4 text-right">Amount</th>
                    <th class="px-6 py-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- SUCCESS ROW -->
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-gray-900">#ORD-001</td>
                    <td class="px-6 py-4">alex.mercer@example.com</td>
                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center border border-purple-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        Cyberpunk 2077
                    </td>
                    <td class="px-6 py-4 font-mono font-medium text-gray-600">A1B2-C3D4-E5F6</td>
                    <td class="px-6 py-4 font-mono font-semibold text-gray-900 text-right">$59.99</td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-green-100 text-green-700 px-3 py-1.5 rounded-md text-[11px] font-bold uppercase tracking-wider">Success</span>
                    </td>
                </tr>

                <!-- PENDING ROW -->
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-gray-900">#ORD-002</td>
                    <td class="px-6 py-4">sarah.connor@example.com</td>
                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center border border-purple-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        Elden Ring
                    </td>
                    <td class="px-6 py-4 font-mono text-gray-400 text-sm">PENDING_ALLOC</td>
                    <td class="px-6 py-4 font-mono font-semibold text-gray-900 text-right">$49.99</td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1.5 rounded-md text-[11px] font-bold uppercase tracking-wider">Pending</span>
                    </td>
                </tr>

                <!-- FAILED ROW -->
                <tr class="hover:bg-gray-50/50 transition-colors bg-red-50/20">
                    <td class="px-6 py-4 font-bold text-gray-900">#ORD-003</td>
                    <td class="px-6 py-4">t.stark@starkindustries.com</td>
                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center border border-purple-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        Starfield
                    </td>
                    <td class="px-6 py-4 font-mono text-gray-400 text-sm">PAYMENT_DECLINED</td>
                    <td class="px-6 py-4 font-mono font-semibold text-gray-900 text-right">$69.99</td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-red-100 text-red-700 px-3 py-1.5 rounded-md text-[11px] font-bold uppercase tracking-wider">Failed</span>
                    </td>
                </tr>

                <!-- SUCCESS ROW -->
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-gray-900">#ORD-004</td>
                    <td class="px-6 py-4">b.wayne@wayneent.com</td>
                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center border border-purple-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        Batman: Arkham Knight
                    </td>
                    <td class="px-6 py-4 font-mono font-medium text-gray-600">G7H8-I9J0-K1L2</td>
                    <td class="px-6 py-4 font-mono font-semibold text-gray-900 text-right">$19.99</td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-green-100 text-green-700 px-3 py-1.5 rounded-md text-[11px] font-bold uppercase tracking-wider">Success</span>
                    </td>
                </tr>

                <!-- SUCCESS ROW -->
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-gray-900">#ORD-005</td>
                    <td class="px-6 py-4">clark.k@dailyplanet.com</td>
                    <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center border border-purple-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        Injustice 2
                    </td>
                    <td class="px-6 py-4 font-mono font-medium text-gray-600">M3N4-O5P6-Q7R8</td>
                    <td class="px-6 py-4 font-mono font-semibold text-gray-900 text-right">$29.99</td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-green-100 text-green-700 px-3 py-1.5 rounded-md text-[11px] font-bold uppercase tracking-wider">Success</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30 flex justify-between items-center">
        <p class="text-sm text-gray-500 font-medium">Showing 1 to 5 of 2,341 entries</p>
        <div class="flex gap-1">
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 bg-white cursor-not-allowed">&lt;</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-purple-600 text-white font-medium text-sm shadow-md shadow-purple-200">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">3</button>
            <span class="w-8 h-8 flex items-center justify-center text-gray-400 text-sm">...</span>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 transition-colors">&gt;</button>
        </div>
    </div>
</div>
@endsection
