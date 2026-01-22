{{-- resources/views/categories/create.blade.php --}}
<x-app-layout>
<x-slot name="header">
    <h2 class="font-bold text-2xl text-slate-900 leading-tight">
        {{ __('Registrasi Kategori Baru') }}
    </h2>
</x-slot>

<x-slot name="actions">
    <a href="{{ route('categories.index') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</x-slot>

<div class="max-w-2xl mx-auto ">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <form action="{{ route('categories.store') }}" method="POST" class="p-8 space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="name" class="text-sm font-semibold text-slate-700">Nama Kategori</label>
                <input type="text" name="name" id="name"
                       class="w-full px-4 py-2 rounded-enterprise border-slate-200 focus:border-brand-primary focus:ring focus:ring-blue-100 transition-all outline-none border @error('name') border-brand-danger @enderror"
                       placeholder="Contoh: Elektronik, Bahan Baku, dll"
                       value="{{ old('name') }}">
                @error('name') <p class="text-xs text-brand-danger">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label for="description" class="text-sm font-semibold text-slate-700">Deskripsi (Opsional)</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2 rounded-enterprise border-slate-200 focus:border-brand-primary focus:ring focus:ring-blue-100 transition-all outline-none border"
                          placeholder="Berikan keterangan singkat mengenai kategori ini...">{{ old('description') }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-4 border-t border-slate-100">
                <a href="{{ route('categories.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Batal</a>
                <button type="submit"
                        class="px-6 py-2 bg-brand-primary text-white text-sm font-semibold rounded-xl bg-blue-400 hover:bg-blue-700 transition shadow-sm">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
