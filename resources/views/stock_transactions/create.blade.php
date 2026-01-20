<x-app-layout>
    <x-slot name="header">{{ __('Input Transaksi Baru') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('stock-transactions.index') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </x-slot>

    <div class="flex items-center justify-center">
    <div class="max-w-4xl" x-data="{ type: 'IN' }">
        <form action="{{ route('stock-transactions.store') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-500">
            @csrf

            <div :class="type === 'IN' ? 'bg-green-600' : 'bg-orange-600'" class="px-8 py-6 transition-colors duration-500">
                <h3 class="text-white font-bold text-lg leading-tight">Formulir Pergerakan Barang</h3>
                <p class="text-white/70 text-xs mt-1">Pastikan stok fisik sesuai dengan data yang diinput.</p>
            </div>

            <div class="p-8 space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <x-input-label :value="__('Jenis Transaksi')" />
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="type" value="IN" x-model="type" class="peer sr-only">
                                <div class="p-4 text-center border-2 rounded-2xl transition-all peer-checked:border-green-600 peer-checked:bg-green-50 text-slate-400 peer-checked:text-green-700">
                                    <p class="text-xs font-black uppercase tracking-widest">Barang Masuk</p>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="type" value="OUT" x-model="type" class="peer sr-only">
                                <div class="p-4 text-center border-2 rounded-2xl transition-all peer-checked:border-orange-600 peer-checked:bg-orange-50 text-slate-400 peer-checked:text-orange-700">
                                    <p class="text-xs font-black uppercase tracking-widest">Barang Keluar</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <x-input-label for="quantity" :value="__('Jumlah Kuantitas')" />
                        <x-text-input id="quantity" name="quantity" type="number" class="block w-full text-xl font-bold" min="1" required />
                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                    <div class="space-y-3">
                        <x-input-label for="item_id" :value="__('Pilih Barang')" />
                        <select name="items_id" id="item_id" class="block w-full border-slate-200 focus:border-slate-900 focus:ring-slate-900 rounded-xl shadow-sm transition-all" required>
                            <option value="">-- Cari Barang --</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->unit }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('item_id')" class="mt-2" />
                    </div>

                    <div class="space-y-3">
                        <x-input-label for="warehouse_id" :value="__('Lokasi Gudang')" />
                        <select name="warehouse_id" id="warehouse_id" class="block w-full border-slate-200 focus:border-slate-900 focus:ring-slate-900 rounded-xl shadow-sm transition-all" required>
                            <option value="">-- Pilih Gudang --</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('warehouse_id')" class="mt-2" />
                    </div>
                </div>

                <div class="space-y-3">
                    <x-input-label for="note" :value="__('Catatan Tambahan')" />
                    <textarea id="note" name="note" rows="3" class="block w-full border-slate-200 focus:border-slate-900 focus:ring-slate-900 rounded-2xl shadow-sm placeholder:text-slate-300" placeholder="Ketik alasan transaksi (contoh: Penjualan ritel, Stok opname, dll)"></textarea>
                    <x-input-error :messages="$errors->get('note')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4 pt-6 border-t border-slate-100">
                    <button type="submit" :class="type === 'IN' ? 'bg-green-600 hover:bg-green-700' : 'bg-orange-600 hover:bg-orange-700'" class="px-10 py-3 text-white font-black uppercase text-[11px] tracking-widest rounded-xl transition-all shadow-lg shadow-slate-200">
                        Konfirmasi Transaksi
                    </button>
                    <a href="{{ route('stock-transactions.index') }}" class="text-xs font-bold text-slate-400 hover:text-slate-600 uppercase tracking-widest">Batal</a>
                </div>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
