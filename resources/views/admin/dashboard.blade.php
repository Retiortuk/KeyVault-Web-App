@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-bold text-gray-900">Dashboard Overview</h2>
    <p class="text-gray-500 mt-1">Welcome back, Admin. Here's what's happening today.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Card Total Games Catalog -->
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-purple-200 hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
            <div class="p-2 bg-purple-50 text-purple-600 rounded-lg">
                <svg class="w-8 h-8" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#9810fa"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.a{fill:none;stroke:#9810fa;stroke-linecap:round;stroke-linejoin:round;}</style></defs><rect class="a" x="4.5" y="14" width="39" height="20" rx="10"></rect><path class="a" d="M16.66,22.43H15.37V21.14a1.57,1.57,0,1,0-3.14,0v1.29H10.94a1.57,1.57,0,1,0,0,3.14h1.29v1.29a1.57,1.57,0,0,0,3.14,0V25.57h1.29a1.57,1.57,0,0,0,0-3.14Z"></path><rect class="a" x="27.79" y="24.23" width="4.82" height="4.82" rx="2.41"></rect><rect class="a" x="33.07" y="18.95" width="4.82" height="4.82" rx="2.41"></rect></g></svg>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Total Games Catalog</h3>
        <p class="text-3xl font-bold text-gray-900 mt-1">1,248</p>
    </div>

    <!-- Card Total Keys Available -->
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-purple-200 hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-purple-50 text-purple-600 rounded-lg">
                <svg class="w-8 h-8" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 14.32C18.3137 14.32 21 11.6337 21 8.32001C21 5.0063 18.3137 2.32001 15 2.32001C11.6863 2.32001 9 5.0063 9 8.32001C9 11.6337 11.6863 14.32 15 14.32Z" stroke="#9810fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8 19.32L6 17.32" stroke="#9810fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M5 22.32L3 20.32" stroke="#9810fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3 20.32L10.76 12.56" stroke="#9810fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Key's Available</h3>
        <p class="text-3xl font-bold text-gray-900 mt-1">900</p>
    </div>

    <!-- Card Total Key Sold -->
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-purple-200 hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-purple-50 text-purple-600 rounded-lg">
                <svg class="w-8 h-8" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#9810fa"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#9810fa" d="M704 288h131.072a32 32 0 0 1 31.808 28.8L886.4 512h-64.384l-16-160H704v96a32 32 0 1 1-64 0v-96H384v96a32 32 0 0 1-64 0v-96H217.92l-51.2 512H512v64H131.328a32 32 0 0 1-31.808-35.2l57.6-576a32 32 0 0 1 31.808-28.8H320v-22.336C320 154.688 405.504 64 512 64s192 90.688 192 201.664v22.4zm-64 0v-22.336C640 189.248 582.272 128 512 128c-70.272 0-128 61.248-128 137.664v22.4h256zm201.408 476.16a32 32 0 1 1 45.248 45.184l-128 128a32 32 0 0 1-45.248 0l-128-128a32 32 0 1 1 45.248-45.248L704 837.504V608a32 32 0 1 1 64 0v229.504l73.408-73.408z"></path></g></svg></div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Total Keys Sold</h3>
        <p class="text-3xl font-bold text-gray-900 mt-1">500</p>
    </div>

    <!-- Card Total Income -->
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-purple-200 hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-purple-50 text-purple-600 rounded-lg">
                <svg class="w-8 h-8" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.8702 16.97V18.0701C12.8702 18.2478 12.7995 18.4181 12.6739 18.5437C12.5482 18.6694 12.3778 18.74 12.2001 18.74C12.0224 18.74 11.852 18.6694 11.7264 18.5437C11.6007 18.4181 11.5302 18.2478 11.5302 18.0701V16.9399C11.0867 16.8668 10.6625 16.7051 10.2828 16.4646C9.90316 16.2241 9.57575 15.9097 9.32013 15.54C9.21763 15.428 9.16061 15.2817 9.16016 15.1299C9.16006 15.0433 9.17753 14.9576 9.21155 14.8779C9.24557 14.7983 9.29545 14.7263 9.35809 14.6665C9.42074 14.6067 9.49484 14.5601 9.57599 14.5298C9.65713 14.4994 9.7436 14.4859 9.83014 14.49C9.91602 14.4895 10.0009 14.5081 10.0787 14.5444C10.1566 14.5807 10.2254 14.6338 10.2802 14.7C10.6 15.1178 11.0342 15.4338 11.5302 15.6099V13.0701C10.2002 12.5401 9.53015 11.77 9.53015 10.76C9.55019 10.2193 9.7627 9.70353 10.1294 9.30566C10.4961 8.9078 10.9929 8.65407 11.5302 8.59009V7.47998C11.5302 7.30229 11.6007 7.13175 11.7264 7.0061C11.852 6.88045 12.0224 6.81006 12.2001 6.81006C12.3778 6.81006 12.5482 6.88045 12.6739 7.0061C12.7995 7.13175 12.8702 7.30229 12.8702 7.47998V8.58008C13.2439 8.63767 13.6021 8.76992 13.9234 8.96924C14.2447 9.16856 14.5226 9.43077 14.7402 9.73999C14.8284 9.85568 14.8805 9.99471 14.8901 10.1399C14.8928 10.2256 14.8783 10.3111 14.8473 10.3911C14.8163 10.4711 14.7696 10.5439 14.7099 10.6055C14.6502 10.667 14.5787 10.7161 14.4998 10.7495C14.4208 10.7829 14.3359 10.8001 14.2501 10.8C14.1607 10.7989 14.0725 10.7787 13.9915 10.7407C13.9104 10.7028 13.8384 10.648 13.7802 10.5801C13.5417 10.2822 13.2274 10.054 12.8702 9.91992V12.1699L13.1202 12.27C14.3902 12.76 15.1802 13.4799 15.1802 14.6299C15.163 15.2399 14.9149 15.8208 14.4862 16.2551C14.0575 16.6894 13.4799 16.9449 12.8702 16.97ZM11.5302 11.5901V9.96997C11.3688 10.0285 11.2298 10.1363 11.1329 10.2781C11.0361 10.4198 10.9862 10.5884 10.9902 10.76C10.9984 10.93 11.053 11.0945 11.1483 11.2356C11.2435 11.3767 11.3756 11.4889 11.5302 11.5601V11.5901ZM13.7302 14.6599C13.7302 14.1699 13.3902 13.8799 12.8702 13.6599V15.6599C13.1157 15.6254 13.3396 15.5009 13.4985 15.3105C13.6574 15.1202 13.74 14.8776 13.7302 14.6299V14.6599Z" fill="#9810fa"></path> <path d="M12.58 3.96997H6C4.93913 3.96997 3.92178 4.39146 3.17163 5.1416C2.42149 5.89175 2 6.9091 2 7.96997V17.97C2 19.0308 2.42149 20.0482 3.17163 20.7983C3.92178 21.5485 4.93913 21.97 6 21.97H18C19.0609 21.97 20.0783 21.5485 20.8284 20.7983C21.5786 20.0482 22 19.0308 22 17.97V11.8999" stroke="#9810fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21.9998 2.91992L16.3398 8.57992" stroke="#9810fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.8698 8.5798H16.3398V4.0498" stroke="#9810fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Total Income</h3>
        <p class="text-3xl font-bold text-gray-900 mt-1">Rp.4.545.000</p>
    </div>
</div>

<!-- Recent Transactions Didieu -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
        <h3 class="text-lg font-bold text-gray-900">Recent Transactions</h3>
        <a href="{{ route('admin.transactions.index') }}" class="text-sm font-semibold text-purple-600 hover:text-purple-800 uppercase tracking-wider">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50/50 text-gray-400 font-semibold text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4">Transaction ID</th>
                    <th class="px-6 py-4">Game</th>
                    <th class="px-6 py-4">Key Snippet</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Amount</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50/50">
                    <td class="px-6 py-4 font-medium text-gray-900">TX-89241A</td>
                    <td class="px-6 py-4 font-bold text-gray-900">Cyberpunk 2077</td>
                    <td class="px-6 py-4 font-mono text-gray-500">CYBR-****-9X2L</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Success</span>
                    </td>
                    <td class="px-6 py-4 text-right font-medium text-gray-900">Rp.309.000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
