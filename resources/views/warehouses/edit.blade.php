<x-app-layout>
    <x-slot name="header">{{ __('Edit Gudang') }}</x-slot>

    <div class="max-w-2xl">
        <form action="{{ route('warehouses.update', $warehouse) }}" method="POST" class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            @csrf @method('PUT')
            <div class="space-y-6">
                <div>
                    <x-input-label for="name" :value="__('Nama Gudang')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $warehouse->name)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="location" :value="__('Lokasi / Alamat')" />
                    <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $warehouse->location)" />
                    <x-input-error class="mt-2" :messages="$errors->get('location')" />
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                    <x-primary-button class="px-8 shadow-lg shadow-blue-600/20">Perbarui Gudang</x-primary-button>
                    <a href="{{ route('warehouses.index') }}" class="text-sm font-bold text-slate-500 hover:text-slate-700 transition">Batal</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
