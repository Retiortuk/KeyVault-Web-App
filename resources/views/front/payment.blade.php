@extends('layouts.front')
@section('title', 'Complete Payment - KeyVault')

@section('content')
<div class="bg-gray-50/50 min-h-[70vh] py-16 flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 text-center">

        <!-- Loading Spinner -->
        <div class="flex justify-center mb-6">
            <div class="w-16 h-16 border-4 border-purple-100 border-t-purple-600 rounded-full animate-spin"></div>
        </div>

        <h1 class="text-2xl font-black text-gray-900 mb-2">Awaiting Payment</h1>
        <p class="text-gray-500 font-medium text-sm mb-8">
            Please complete the payment process in the Midtrans secure pop-up. Do not close this window.
        </p>

        <!-- Order Detail -->
        <div class="bg-gray-50 rounded-2xl p-5 mb-8 text-left border border-gray-100">
            <div class="flex justify-between items-center mb-3">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Order ID</span>
                <span class="text-sm font-mono font-bold text-gray-900">{{ $transaction->order_id }}</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Product</span>
                <span class="text-sm font-bold text-gray-900 line-clamp-1 text-right max-w-[150px]">{{ $transaction->game->title }}</span>
            </div>
            <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total</span>
                <span class="text-base font-black text-purple-700">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
            </div>
        </div>

        <button id="pay-button" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 rounded-xl transition-all shadow-md shadow-purple-600/30 hidden">
            Re-open Payment Pop-up
        </button>
    </div>
</div>

<!-- Load Script Snap Midtrans -->
<script src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var payButton = document.getElementById('pay-button');
        var snapToken = '{{ $transaction->snap_token }}';

        function triggerPayment() {
            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    // Redirect jika pembayaran sukses (validasi aslinya tetap di Webhook)
                    window.location.href = "{{ route('checkout.success', $transaction->order_code) }}";
                },
                onPending: function(result) {
                    alert("Awaiting your payment. Please complete the transaction.");
                },
                onError: function(result) {
                    // Redirect jika pembayaran gagal
                    window.location.href = "{{ route('checkout.failed') }}";
                },
                onClose: function() {
                    // Jika popup di-close oleh user, tampilkan tombol re-open
                    payButton.classList.remove('hidden');
                }
            });
        }

        // Jalankan pop-up secara otomatis saat halaman dimuat
        triggerPayment();

        // Fitur klik tombol jika user tidak sengaja menutup pop-up
        payButton.addEventListener('click', function () {
            triggerPayment();
        });
    });
</script>
@endsection
