@section('page-title', "Transaksi Stok")

<x-app-layout>
    <x-slot name="header">{{ ('Riwayat Transaksi Stok') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('stock-transactions.create') }}" class="flex items-center gap-2 px-4 py-2.5 bg-slate-900 text-white text-sm font-bold rounded-xl hover:bg-slate-800 transition shadow-lg shadow-slate-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Catat Transaksi
        </a>
        @if(auth()->user()->hasAnyRole(['supervisor', 'admin', 'owner']))
            <a href="{{ route('reports.stock-transactions.download') }}"
            class="bg-green-600 hover:bg-green-900 inline-block px-3.5 py-2 rounded-xl text-white font-bold">
                Download Reports
            </a>
        @endif
    </x-slot>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 text-[11px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-8 py-5">Waktu & User</th>
                        <th class="px-8 py-5">Barang</th>
                        <th class="px-8 py-5">Gudang</th>
                        <th class="px-8 py-5 text-center">Tipe</th>
                        <th class="px-8 py-5 text-right">Jumlah</th>
                        <th class="px-8 py-5">Catatan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($transactions as $trx)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-slate-700">{{ $trx->created_at->format('d M Y') }}</span>
                                <span class="text-[10px] text-slate-400 font-medium uppercase tracking-tighter">{{ $trx->created_at->format('H:i') }} • {{ $trx->users->name ?? 'System' }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-sm font-bold text-slate-600">{{ $trx->items->sku }}</td>
                        <td class="px-8 py-5">
                            <span class="text-xs font-semibold text-slate-500 bg-slate-100 px-2 py-1 rounded-md">{{ $trx->warehouse->name }}</span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            @if($trx->type === 'IN')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-50 text-green-600 text-[10px] font-black uppercase rounded-full border border-green-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                                    Masuk
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-orange-50 text-orange-600 text-[10px] font-black uppercase rounded-full border border-orange-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                    Keluar
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-5 text-right font-black text-slate-800 tracking-tight">
                            {{ number_format($trx->quantity) }}
                        </td>
                        <td class="px-8 py-5">
                            <p class="text-xs text-slate-400 italic truncate max-w-[150px]">{{ $trx->note ?? '-' }}</p>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-20 text-center text-slate-400 text-sm">Belum ada aktivitas transaksi stok.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($transactions->hasPages())
        <div class="px-8 py-5 bg-slate-50/50 border-t border-slate-100">
            {{ $transactions->links() }}
        </div>
        @endif
    </div>
</x-app-layout>
