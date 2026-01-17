<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-slate-900 leading-tight">
            {{ __('Registrasi Barang Baru') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl">
        <form action="{{ route('items.store') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            @csrf

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Nama Barang --}}
                    <div>
                        <x-input-label for="name" :value="__('Nama Barang')" class="font-bold text-slate-700" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-2xl border-slate-200" :value="old('name')" required placeholder="Contoh: Laptop Pro X" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    {{-- SKU --}}
                    <div>
                        <x-input-label for="sku" :value="__('SKU (Stock Keeping Unit)')" class="font-bold text-slate-700" />
                        <x-text-input id="sku" name="sku" type="text" class="mt-1 block w-full rounded-2xl border-slate-200 font-mono tracking-wider uppercase" :value="old('sku')" required placeholder="Mis: PRO-001" />
                        <x-input-error class="mt-2" :messages="$errors->get('sku')" />
                    </div>
                </div>

                {{-- Kategori --}}
                <div>
                    <x-input-label for="category_id" :value="__('Pilih Kategori')" class="font-bold text-slate-700" />
                    <select id="category_id" name="category_id" class="mt-1 block w-full rounded-2xl border-slate-200 shadow-sm focus:border-brand-primary focus:ring-4 focus:ring-blue-50 transition-all outline-none py-2.5 px-4 text-slate-700 border">
                        <option value="">-- Pilih Salah Satu --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                </div>

                {{-- Deskripsi --}}
                <div>
                    <x-input-label for="description" :value="__('Keterangan Barang')" class="font-bold text-slate-700" />
                    <textarea id="description" name="description" class="mt-1 block w-full rounded-2xl border-slate-200 shadow-sm focus:border-brand-primary focus:ring-4 focus:ring-blue-50 transition-all min-h-[100px] border px-4 py-2">{{ old('description') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div class="flex items-center gap-6 pt-6 border-t border-slate-100">
                    <x-primary-button class="px-10 py-3.5 bg-brand-primary rounded-2xl shadow-xl shadow-blue-600/20 active:scale-95 transition-all">
                        {{ __('Simpan Item') }}
                    </x-primary-button>
                    <a href="{{ route('items.index') }}" class="text-sm font-bold text-slate-400 hover:text-slate-600 transition uppercase tracking-widest">Batal</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
