<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Barang') }}
    </x-slot>

    <x-slot name="actions">
        <a href="{{ route('items.index') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <a href="{{ route('items.edit', $item->id) }}" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            Edit Barang
        </a>
    </x-slot>

    <div class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
                <div class="flex items-start gap-6">
                    <div class="w-24 h-24 bg-slate-50 rounded-2xl flex items-center justify-center border border-slate-100 shrink-0">
                        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3">
                            <span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase tracking-widest rounded-md border border-blue-100">
                                {{ $item->category->name ?? 'General' }}
                            </span>
                            <span class="text-slate-400 text-xs font-medium">SKU: {{ $item->sku ?? 'N/A' }}</span>
                        </div>
                        <h1 class="text-3xl font-bold text-slate-900 mt-2">{{ $item->name }}</h1>
                        <p class="text-slate-500 mt-2 leading-relaxed">{{ $item->description ?? 'Tidak ada deskripsi tambahan untuk produk ini.' }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-10 pt-8 border-t border-slate-100">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Satuan</p>
                        <p class="text-base font-semibold text-slate-700 mt-1">{{ $item->unit ?? 'Pcs' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Lokasi Gudang</p>
                        <p class="text-base font-semibold text-slate-700 mt-1">{{ $item->location ?? 'Rak A-1' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Terakhir Update</p>
                        <p class="text-base font-semibold text-slate-700 mt-1">{{ $item->updated_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-900 tracking-tight">Status Inventaris</h3>
                    <p class="text-xs text-slate-500 mt-1">Kondisi stok saat ini secara real-time.</p>
                </div>

                <div class="py-8 text-center">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Stok Tersedia</p>
                    <h2 class="text-6xl font-black text-slate-900 tracking-tighter">{{ $item->stock }}</h2>
                    <div class="mt-4 inline-flex items-center gap-2 px-3 py-1.5 rounded-full {{ $item->stock > 10 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }} text-xs font-bold">
                        <span class="w-2 h-2 rounded-full {{ $item->stock > 10 ? 'bg-green-500' : 'bg-red-500' }} animate-pulse"></span>
                        {{ $item->stock > 10 ? 'Stok Aman' : 'Stok Menipis' }}
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500 font-medium">Minimum Stock</span>
                        <span class="text-slate-900 font-bold">10 {{ $item->unit }}</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-full transition-all duration-500" style="width: {{ min(($item->stock / 50) * 100, 100) }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <h3 class="font-bold text-slate-900">Riwayat Transaksi Terakhir</h3>
                <button class="text-blue-600 text-xs font-bold hover:underline">Lihat Semua Log</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            <th class="px-8 py-4">Tipe</th>
                            <th class="px-8 py-4">Jumlah</th>
                            <th class="px-8 py-4">Oleh</th>
                            <th class="px-8 py-4">Tanggal</th>
                            <th class="px-8 py-4">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($item->transactions ?? [] as $transaction)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-8 py-4">
                                <span class="px-2 py-1 rounded-md text-[10px] font-bold uppercase {{ $transaction->type == 'in' ? 'bg-green-50 text-green-600' : 'bg-orange-50 text-orange-600' }}">
                                    {{ $transaction->type == 'in' ? 'Masuk' : 'Keluar' }}
                                </span>
                            </td>
                            <td class="px-8 py-4 font-bold text-slate-700">{{ $transaction->quantity }}</td>
                            <td class="px-8 py-4 text-sm text-slate-600">{{ $transaction->user->name }}</td>
                            <td class="px-8 py-4 text-sm text-slate-500">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-8 py-4 text-sm text-slate-500 italic">"{{ $transaction->note ?? '-' }}"</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-10 text-center text-slate-400 text-sm">Belum ada riwayat transaksi untuk barang ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
