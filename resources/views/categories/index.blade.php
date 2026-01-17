{{-- resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-lg font-semibold text-slate-900">Daftar Kategori</h2>
            <p class="text-sm text-slate-500">Kelola kategori barang untuk pengelompokan stok yang lebih baik.</p>
        </div>
        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center px-4 py-2 bg-brand-primary text-black dark:text-white text-sm font-semibold rounded-enterprise  bg-blue-400 hover:bg-blue-700 transition shadow-sm rounded-xl">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Kategori
        </a>
    </div>

    <div class="bg-white rounded-enterprise border border-slate-200 shadow-sm overflow-hidden rounded-3xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-bottom border-slate-200">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Nama Kategori</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($data as $category)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <span class="font-semibold text-slate-900">{{ $category->name }}</span>
                    </td>
                    <td class="px-6 py-4 text-slate-500 text-sm">
                        {{ $category->description ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('categories.edit', $category) }}" class="text-slate-400 hover:text-brand-primary transition">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-brand-danger transition" onclick="return confirm('Hapus kategori ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
