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
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($transactions as $transaction)
                <tr class="hover:bg-gray-50/50 transition-colors">

                    <!-- Date & Order ID -->
                    <td class="p-4">
                        <div class="font-bold text-gray-900">{{ $transaction->order_code }}</div>
                        <div class="text-xs text-gray-500">{{ $transaction->created_at->format('d M Y, H:i') }}</div>
                    </td>

                    <!-- Customer -->
                    <td class="p-4">
                        <div class="font-semibold text-gray-900">{{ $transaction->customer_name }}</div>
                        <div class="text-xs text-gray-500">{{ $transaction->customer_email }}</div>
                    </td>

                    <!-- Game -->
                    <td class="p-4">
                        <span class="font-semibold text-gray-800">{{ $transaction->game->title }}</span>
                    </td>

                    <!-- License Key -->
                    <td class="p-4">
                        @if($transaction->gameKey)
                            <code class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-xs font-mono border border-gray-200">
                                {{ $transaction->gameKey->license_key }}
                            </code>
                        @else
                            <span class="text-gray-400 italic text-xs">Waiting / None</span>
                        @endif
                    </td>

                    <!-- Amount -->
                    <td class="p-4 font-bold text-gray-900">
                        Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                    </td>

                    <!-- Status -->
                    <td class="p-4">
                        @if($transaction->status === 'success')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                SUCCESS
                            </span>
                        @elseif($transaction->status === 'pending')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                                PENDING
                            </span>
                        @elseif($transaction->status === 'failed')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                FAILED
                            </span>
                        @elseif($transaction->status === 'success_no_key')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-orange-100 text-orange-700">
                                PAID - NO KEY
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-700">
                                {{ strtoupper($transaction->status) }}
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400">
                        No transactions found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($transactions->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $transactions->links() }}
        </div>
    @endif
</div>
@endsection
