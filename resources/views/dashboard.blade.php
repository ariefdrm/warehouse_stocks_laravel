<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Overview') }}
    </x-slot>

    {{-- <x-slot name="actions">
        <button
            class="flex items-center gap-2 bg-white border border-slate-200 px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
            Export Laporan
        </button>
    </x-slot> --}}

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm shadow-slate-200/50">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg">+12%</span>
                </div>
                <p class="text-sm font-medium text-slate-500">Total Stok Barang</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">2,840</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm shadow-slate-200/50">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-red-500 bg-red-50 px-2 py-1 rounded-lg">5 Tipis</span>
                </div>
                <p class="text-sm font-medium text-slate-500">Stok Hampir Habis</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">12 Item</h3>
            </div>

        </div>

        <div class="bg-white border border-slate-100 rounded-2xl p-8 text-center shadow-sm shadow-slate-200/50">
            <div class="max-w-sm mx-auto">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Selamat Datang, {{ auth()->user()->name }}!</h3>
                <p class="text-slate-500 mt-2 text-sm leading-relaxed">
                    Panel kendali gudang sudah siap. Mulai dengan mengecek stok barang atau melihat laporan transaksi
                    hari ini.
                </p>
                <div class="mt-6">
                    <button
                        class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                        Lihat Inventaris
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
