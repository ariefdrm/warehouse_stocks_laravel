<x-app-layout>
    <x-slot name="header">{{ __('Tambah Gudang Baru') }}</x-slot>

    <div class="max-w-2xl">
        <form action="{{ route('warehouses.store') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            @csrf
            <div class="space-y-6">
                <div>
                    <x-input-label for="name" :value="__('Nama Gudang')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required placeholder="Contoh: Gudang Utama Jakarta" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="location" :value="__('Lokasi / Alamat')" />
                    <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location')" placeholder="Jl. Ekonomi No. 123..." />
                    <x-input-error class="mt-2" :messages="$errors->get('location')" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Deskripsi')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description')" placeholder="Gudang Khusus Barang Elektronik" />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                    <x-primary-button class="px-8">Simpan Gudang</x-primary-button>
                    <a href="{{ route('warehouses.index') }}" class="text-sm font-bold text-slate-500 hover:text-slate-700 transition">Batal</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
