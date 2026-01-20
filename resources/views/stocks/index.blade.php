@section('page-title', "Manajemen Stock")

<x-app-layout>
    <x-slot name="header">{{ __('Manajemen Stok') }}</x-slot>

    <x-slot name="actions">
        @if (!auth()->user()->hasAnyRole(['staff', 'supervisor']))
        <a href="{{ route('stocks.create') }}" class="flex items-center gap-2 px-4 py-2.5 bg-slate-900 text-white text-sm font-bold rounded-xl hover:bg-slate-800 transition shadow-lg shadow-slate-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Inisialisasi Stok
        </a>
        @endif
        @if(auth()->user()->hasAnyRole(['supervisor', 'admin', 'owner']))
            <a href="{{ route('reports.stocks.download') }}"
            class="bg-green-600 hover:bg-green-900 inline-block px-3.5 py-2 rounded-xl text-white font-bold">
                Download Reports
            </a>
        @endif
    </x-slot>

    @if ($errors->has('quantity'))
        <div class="mb-6 flex items-center p-4 rounded-2xl bg-red-50 border border-red-100 shadow-sm animate-shake">
            <div class="flex-shrink-0 p-2 bg-brand-danger rounded-xl text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-sm font-bold text-red-800">Aksi Ditolak</h3>
                <p class="text-xs text-red-600 mt-0.5">{{ $errors->first('quantity') }}</p>
            </div>
            <button type="button" @click="$el.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/></path></svg>
            </button>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="px-8 py-4">Nama/Unit Barang</th>
                        <th class="px-8 py-4">Gudang / Lokasi</th>
                        <th class="px-8 py-4 text-center">Stok Awal</th>
                        <th class="px-8 py-4 text-center">Jumlah Stok</th>
                        <th class="px-8 py-4">Status</th>
                        @if (!auth()->user()->hasRole('staff'))
                            <th class="px-8 py-4 text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($stocks as $stock)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-4">
                            <div class="flex flex-col">
                                <span class="font-bold text-black">{{ $stock->items->unit }}</span>
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
                            <span class="text-base font-black text-slate-800">{{ number_format($stock->initial_stock) }}</span>
                            <span class="text-[10px] text-slate-400 font-bold ml-1 uppercase">Unit</span>
                        </td>
                        <td class="px-8 py-4 text-center">
                            <span class="text-base font-black text-slate-800">{{ number_format($stock->quantity) }}</span>
                            <span class="text-[10px] text-slate-400 font-bold ml-1 uppercase">{{ $stock->item->unit ?? 'Unit' }}</span>
                        </td>
                        <td class="px-8 py-4">
                            @if($stock->quantity <= 10)
                                <span class="px-2 py-1 bg-red-50 text-red-600 text-[10px] font-black uppercase rounded-md border border-red-100">Low Stock</span>
                            @else
                                <span class="px-2 py-1 bg-green-50 text-green-600 text-[10px] font-black uppercase rounded-md border border-green-100">Healthy</span>
                            @endif
                        </td>
                        @if (!auth()->user()->hasRole('staff'))
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
                        @endif
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
