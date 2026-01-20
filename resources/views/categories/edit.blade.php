<x-app-layout>
    {{-- Header Section sesuai tema StokFlow --}}
    <x-slot name="header">
        <div class="flex flex-col">
            <h2 class="font-bold text-2xl text-slate-900 leading-tight">
                {{ __('Edit Kategori') }}
            </h2>
            <p class="text-sm text-slate-500 mt-1">Sesuaikan klasifikasi stok barang Anda.</p>
        </div>
    </x-slot>

    <x-slot name="actions">
        <a href="{{ route('categories.index') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </x-slot>

    <div class="flex flex-shrink-0 flex-col max-w-2xl mx-auto">
        <form action="{{ route('categories.update', $category) }}" method="POST"
              class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm transition-all duration-300 hover:shadow-md">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                {{-- Nama Kategori --}}
                <div>
                    <x-input-label for="name" :value="__('Nama Kategori')" class="text-slate-700 font-bold mb-1" />
                    <x-text-input id="name" name="name" type="text"
                                  class="mt-1 block w-full rounded-2xl border-slate-200 focus:border-brand-primary focus:ring-4 focus:ring-blue-50"
                                  :value="old('name', $category->name)"
                                  required
                                  placeholder="Contoh: Elektronik" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                {{-- Deskripsi --}}
                <div>
                    <x-input-label for="description" :value="__('Deskripsi (Opsional)')" class="text-slate-700 font-bold mb-1" />
                    <textarea id="description" name="description"
                              class="mt-1 block w-full rounded-2xl border-slate-200 shadow-sm focus:border-brand-primary focus:ring-4 focus:ring-blue-50 transition-all min-h-[120px]"
                              placeholder="Tambahkan keterangan kategori di sini...">{{ old('description', $category->description) }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                {{-- Action Area --}}
                <div class="flex items-center gap-6 pt-6 border-t border-slate-100">
                    <x-primary-button class="px-8 py-3 bg-brand-primary hover:bg-blue-700 rounded-2xl shadow-lg shadow-blue-600/20 transition-all active:scale-95">
                        {{ __('Simpan Perubahan') }}
                    </x-primary-button>

                    <a href="{{ route('categories.index') }}"
                       class="text-sm font-bold text-slate-400 hover:text-slate-700 transition-colors uppercase tracking-wider">
                        {{ __('Batal') }}
                    </a>
                </div>
            </div>
        </form>

        {{-- Micro-info --}}
        <p class="mt-6 text-xs text-slate-400 px-4">
            Terakhir diubah pada: {{ $category->updated_at->format('d M Y, H:i') }}
        </p>
    </div>
</x-app-layout>
