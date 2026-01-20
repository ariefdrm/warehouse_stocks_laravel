<x-app-layout>
    <x-slot name="header">{{ __('Detail Gudang') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('warehouses.index') }}" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl text-sm hover:bg-slate-50 transition">Kembali</a>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900">{{ $warehouse->name }}</h3>
                <p class="text-slate-500 mt-2 text-sm leading-relaxed">{{ $warehouse->location ?? 'Tidak ada informasi lokasi.' }}</p>

                <div class="mt-8 pt-8 border-t border-slate-100">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Status Gudang</p>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        <span class="text-sm font-bold text-slate-700">Aktif Operasional</span>
                    </div>
                </div>
            </div>
        </div>

<div class="lg:col-span-2">
    @forelse($warehouse->stocks as $stock)
        @if($loop->first)
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                <h4 class="text-lg font-bold text-slate-700">Daftar Inventaris</h4>
                <p class="text-slate-400 text-sm mt-1">Daftar barang yang tersedia di unit gudang ini.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[11px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100">
                            <th class="px-8 py-4">Nama Barang</th>
                            <th class="px-8 py-4">Kategori</th>
                            <th class="px-8 py-4 text-right">Jumlah Stok</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
        @endif

                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-8 py-4">
                                <span class="font-bold text-slate-700">{{ $stock->items->unit }}</span>
                            </td>
                            <td class="px-8 py-4">
                                <span class="text-xs font-semibold text-slate-500 bg-slate-100 px-2 py-1 rounded-md">
                                    {{ $stock->items->category->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-8 py-4 text-right">
                                <span class="font-black {{ $stock->quantity <= 5 ? 'text-red-600' : 'text-slate-800' }}">
                                    {{ number_format($stock->quantity) }}
                                </span>
                            </td>
                        </tr>

        @if($loop->last)
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    @empty
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden text-center py-20">
            <svg class="w-16 h-16 text-slate-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <h4 class="text-lg font-bold text-slate-700">Daftar Inventaris</h4>
            <p class="text-slate-400 text-sm mt-1">Gudang ini belum memiliki data barang yang tersimpan.</p>
        </div>
    @endforelse
</div>
    </div>
</x-app-layout>
