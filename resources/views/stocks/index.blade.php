<x-app-layout>
    <x-slot name="header">{{ __('Manajemen Stok') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('stocks.create') }}" class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Inisialisasi Stok
        </a>
    </x-slot>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="px-8 py-4">Nama Barang</th>
                        <th class="px-8 py-4">Gudang / Lokasi</th>
                        <th class="px-8 py-4 text-center">Jumlah Stok</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($stocks as $stock)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-4">
                            <div class="flex flex-col">
                                <span class="font-bold text-black">{{ $stock->items->sku }}</span>
                                <span class="text-[10px] text-black font-medium tracking-tight">ID: #{{ $stock->items->id }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                {{ $stock->warehouse->name }}
                            </div>
                        </td>
                        <td class="px-8 py-4 text-center">
                            <span class="text-base font-black text-slate-800">{{ number_format($stock->quantity) }}</span>
                            <span class="text-[10px] text-slate-400 font-bold ml-1 uppercase">{{ $stock->item->unit ?? 'Unit' }}</span>
                        </td>
                        <td class="px-8 py-4">
                            @if($stock->quantity <= 5)
                                <span class="px-2 py-1 bg-red-50 text-red-600 text-[10px] font-black uppercase rounded-md border border-red-100">Low Stock</span>
                            @else
                                <span class="px-2 py-1 bg-green-50 text-green-600 text-[10px] font-black uppercase rounded-md border border-green-100">Healthy</span>
                            @endif
                        </td>
                        <td class="px-8 py-4 text-center">
                            <div class="flex justify-center gap-1">
                                <a href="{{ route('stocks.edit', $stock) }}" class="p-2 text-slate-400 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('stocks.destroy', $stock) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 transition-colors" onclick="return confirm('Hapus data stok ini?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-slate-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                <p class="text-slate-400 text-sm font-medium">Data stok belum diinisialisasi.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($stocks->hasPages())
        <div class="px-8 py-4 bg-slate-50 border-t border-slate-100">
            {{ $stocks->links() }}
        </div>
        @endif
    </div>
</x-app-layout>
