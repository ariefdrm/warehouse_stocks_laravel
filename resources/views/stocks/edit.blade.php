<x-app-layout>
    <x-slot name="header">{{ __('Update Kuantitas Stok') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('stocks.index') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <form action="{{ route('stocks.update', $stock) }}" method="POST" class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            @csrf @method('PUT')

            <div class="mb-8 p-4 bg-blue-50 border border-blue-100 rounded-2xl flex items-center gap-4">
                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-blue-600 shadow-sm border border-blue-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-slate-800">{{ $stock->items->sku }}</h4>
                    <p class="text-xs text-slate-500 uppercase font-medium tracking-wider">{{ $stock->warehouse->name }}</p>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <x-input-label for="quantity" :value="__('Kuantitas Baru')" />
                    <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full text-2xl font-black" :value="old('quantity', $stock->quantity)" required min="0" />
                    <p class="mt-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">* Perubahan kuantitas akan langsung memperbarui saldo stok di sistem.</p>
                    <x-input-error class="mt-2 text-xs" :messages="$errors->get('quantity')" />
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                    <x-primary-button class="px-8 shadow-lg shadow-blue-600/20">Perbarui Stok</x-primary-button>
                    <a href="{{ route('stocks.index') }}" class="text-sm font-bold text-slate-500 hover:text-slate-700 transition">Batal</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
