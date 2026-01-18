<x-app-layout>
    <x-slot name="header">{{ __('Ringkasan Gudang') }}</x-slot>

    <x-slot name="actions">
        <div
            class="text-xs font-bold text-slate-400 uppercase tracking-widest bg-slate-100 px-4 py-2 rounded-xl border border-slate-200">
            Data Terupdate: {{ now()->format('d M Y, H:i') }}
        </div>
    </x-slot>

    <div class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div
                class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm group hover:border-blue-500 transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="p-3 bg-blue-50 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Total Kuantitas Stok</p>
                <h3 class="text-3xl font-black text-slate-800 tracking-tight mt-1">{{ number_format($totalStock) }}</h3>
            </div>

            <div
                class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm group hover:border-indigo-500 transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="p-3 bg-indigo-50 text-indigo-600 rounded-2xl group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Jenis Barang</p>
                <h3 class="text-3xl font-black text-slate-800 tracking-tight mt-1">{{ $totalItems }}</h3>
            </div>

            <div
                class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm group hover:border-emerald-500 transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="p-3 bg-emerald-50 text-emerald-600 rounded-2xl group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Titik Lokasi Gudang</p>
                <h3 class="text-3xl font-black text-slate-800 tracking-tight mt-1">{{ $totalWarehouses }}</h3>
            </div>

            <div
                class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm group hover:border-amber-500 transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="p-3 bg-amber-50 text-amber-600 rounded-2xl group-hover:bg-amber-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Kategori Produk</p>
                <h3 class="text-3xl font-black text-slate-800 tracking-tight mt-1">{{ $totalCategories }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                    <h3 class="font-bold text-slate-800 tracking-tight">Aktivitas Terkini</h3>
                    <a href="{{ route('stock-transactions.index') }}"
                        class="text-[10px] font-black uppercase text-blue-600 hover:text-blue-700 tracking-widest">Lihat
                        Semua</a>
                </div>
                <div class="p-0">
                    <table class="w-full text-left">
                        <tbody class="divide-y divide-slate-50">
                            @forelse($recentTransactions as $trx)
                                <tr class="hover:bg-slate-50 transition-colors group">
                                    <td class="px-8 py-4">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-8 h-8 rounded-full flex items-center justify-center {{ $trx->type == 'IN' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600' }}">
                                                @if ($trx->type == 'IN')
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-700 leading-tight">
                                                    {{ $trx->items->name ?? 'Barang Dihapus' }}</p>
                                                <p class="text-[10px] text-slate-400 mt-1 uppercase font-semibold">
                                                    {{ $trx->warehouse->name ?? 'Global' }} &bull;
                                                    {{ $trx->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-4 text-right">
                                        <p
                                            class="text-sm font-black {{ $trx->type == 'IN' ? 'text-green-600' : 'text-orange-600' }}">
                                            {{ $trx->type == 'IN' ? '+' : '-' }}{{ number_format($trx->quantity) }}
                                        </p>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-8 py-10 text-center text-slate-400 text-sm">Belum ada transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-red-50/30">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                        <h3 class="font-bold text-red-800 tracking-tight text-sm uppercase tracking-widest">Kritis:
                            Segera Restock</h3>
                    </div>
                </div>
                <div class="p-0">
                    <table class="w-full text-left">
                        <tbody class="divide-y divide-slate-50">
                            @forelse($lowStocks as $low)
                                <tr class="hover:bg-red-50/30 transition-colors">
                                    <td class="px-8 py-4">
                                        <p class="text-sm font-bold text-slate-700 leading-tight">
                                            {{ $low->items->unit }}</p>
                                        <p class="text-[10px] text-slate-400 mt-1 uppercase font-semibold">
                                            {{ $low->warehouse->name }}</p>
                                    </td>
                                    <td class="px-8 py-4 text-right">
                                        <div class="inline-flex flex-col items-end">
                                            <span
                                                class="text-sm font-black text-red-600">{{ number_format($low->quantity) }}</span>
                                            <span
                                                class="text-[9px] font-bold text-red-400 uppercase tracking-tighter">Sisa
                                                Stok</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-4 text-right">
                                        <a href="{{ route('stock-transactions.create') }}"
                                            class="p-2 bg-slate-100 text-slate-400 hover:bg-slate-900 hover:text-white rounded-lg transition-all inline-block">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-8 py-10 text-center text-emerald-500 text-sm font-bold">Semua stok
                                        dalam kondisi aman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
