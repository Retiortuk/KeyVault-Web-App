<!-- Toast Success -->
@if(session('success'))
<div id="toast-success" class="fixed top-8 right-8 z-[100] flex items-center w-full max-w-xs p-4 mb-4 text-gray-600 bg-white rounded-2xl shadow-xl border border-gray-100 transform transition-all duration-300 translate-x-0" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-50 rounded-xl">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
    </div>
    <div class="ml-3 text-sm font-bold text-gray-900">{{ session('success') }}</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gray-50 transition-colors inline-flex h-8 w-8" onclick="closeToast('toast-success')" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
@endif

<!-- Toast Error -->
@if(session('error') || $errors->any())
<div id="toast-error" class="fixed top-8 right-8 z-[100] flex items-center w-full max-w-xs p-4 mb-4 text-gray-600 bg-white rounded-2xl shadow-xl border border-red-100 transform transition-all duration-300 translate-x-0" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-50 rounded-xl border border-red-100">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.4₁₄-₁.₄₁₄L₁₀ 8.586 8.7₀₇ 7.293z" clip-rule="evenodd"></path></svg>
    </div>
    <div class="ml-3 text-sm font-bold text-gray-900">
        {{ session('error') ?? $errors->first() }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-red-50 transition-colors inline-flex h-8 w-8" onclick="closeToast('toast-error')" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
@endif
