<x-app-layout>
    <x-slot name="header">{{ __('Inisialisasi Stok Baru') }}</x-slot>

    <div class="max-w-3xl">
        <form action="{{ route('stocks.store') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            @csrf
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <x-input-label for="item_id" :value="__('Pilih Barang')" />
                        <select name="items_id" id="item_id" class="block w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm transition-all" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($item as $items)
                                <option value="{{ $items->id }}" {{ old('items_id') == $items->id ? 'selected' : '' }}>
                                    {{ $items->unit }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2 text-xs" :messages="$errors->get('item_id')" />
                    </div>

                    <div class="space-y-1">
                        <x-input-label for="warehouse_id" :value="__('Lokasi Gudang')" />
                        <select name="warehouse_id" id="warehouse_id" class="block w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm transition-all" required>
                            <option value="">-- Pilih Gudang --</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}" {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                    {{ $warehouse->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2 text-xs" :messages="$errors->get('warehouse_id')" />
                    </div>
                </div>

                <div class="max-w-xs space-y-1">
                    <x-input-label for="quantity" :value="__('Kuantitas Awal')" />
                    <x-text-input id="quantity" name="quantity" type="number" class="block w-full" :value="old('quantity', 0)" required min="0" />
                    <x-input-error class="mt-2 text-xs" :messages="$errors->get('quantity')" />
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                    <x-primary-button class="px-8 shadow-lg shadow-blue-600/20">Simpan Stok</x-primary-button>
                    <a href="{{ route('stocks.index') }}" class="text-sm font-bold text-slate-500 hover:text-slate-700 transition">Batal</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
