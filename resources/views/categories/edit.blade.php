{{-- resources/views/categories/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="max-w-2xl mx-auto">
    <nav class="flex mb-4 text-sm text-slate-500" aria-label="Breadcrumb">
        <a href="{{ route('categories.index') }}" class="hover:text-brand-primary transition">Kategori</a>
        <span class="mx-2">/</span>
        <span class="text-slate-900 font-medium">Edit Kategori</span>
    </nav>

    <div class="bg-white rounded-enterprise border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50">
            <h2 class="text-lg font-bold text-slate-900">Perbarui Informasi</h2>
            <p class="text-sm text-slate-500">Mengubah kategori: <span class="font-semibold text-brand-primary">{{ $category->name }}</span></p>
        </div>

        <form action="{{ route('categories.update', $category) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="name" class="text-sm font-semibold text-slate-700">Nama Kategori</label>
                <input type="text" name="name" id="name"
                       class="w-full px-4 py-2 rounded-enterprise border-slate-200 focus:border-brand-primary focus:ring-4 focus:ring-blue-50 transition-all outline-none border @error('name') border-brand-danger @enderror"
                       placeholder="Contoh: Elektronik"
                       value="{{ old('name', $category->name) }}">
                @error('name')
                    <p class="text-xs text-brand-danger mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="description" class="text-sm font-semibold text-slate-700">Deskripsi (Opsional)</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2 rounded-enterprise border-slate-200 focus:border-brand-primary focus:ring-4 focus:ring-blue-50 transition-all outline-none border"
                          placeholder="Berikan keterangan singkat...">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="pt-6 flex items-center justify-between border-t border-slate-100">
                {{-- Tombol Hapus Cepat di dalam Edit (Opsional tapi berguna) --}}
                <span class="text-xs text-slate-400 italic">Terakhir diupdate: {{ $category->updated_at->diffForHumans() }}</span>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('categories.index') }}"
                       class="text-sm font-medium text-slate-500 hover:text-slate-700 transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2 text-black bg-brand-primary dark:text-white text-sm font-bold bg-blue-400 rounded-enterprise hover:bg-blue-700 hover:shadow-lg hover:-translate-y-0.5 transition-all active:scale-95">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
