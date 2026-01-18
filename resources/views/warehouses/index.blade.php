@section('page-title', "Manajemen Gudang")

<x-app-layout>
    <x-slot name="header">{{ __('Manajemen Gudang') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('warehouses.create') }}" class="flex items-center gap-2 px-4 py-2.5 bg-slate-900 text-black dark:text-white text-sm font-bold rounded-xl hover:bg-slate-800 transition shadow-lg shadow-slate-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Gudang
        </a>
    </x-slot>


    <div class="flex flex-col gap-6">
        {{-- Deskripsi Halaman --}}
        <div class="bg-blue-50 border border-blue-100 p-4 rounded-2xl flex items-center gap-4">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-blue-600 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-slate-800">Daftar Pengelompokan</h3>
                <p class="text-xs text-slate-500">Kelola Daftar Gudang untuk pengelompokan stok yang lebih terorganisir.</p>
            </div>
        </div>


    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="px-8 py-4">Nama Gudang</th>
                        <th class="px-8 py-4">Lokasi / Alamat</th>
                        <th class="px-8 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($warehouses as $warehouse)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-slate-100 text-slate-500 rounded-lg flex items-center justify-center group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <span class="font-bold text-slate-700">{{ $warehouse->name }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-4 text-sm text-slate-500">{{ $warehouse->location ?? 'Lokasi belum diatur' }}</td>
                        <td class="px-8 py-4">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('warehouses.show', $warehouse) }}" class="p-2 text-slate-400 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                                <a href="{{ route('warehouses.edit', $warehouse) }}" class="p-2 text-slate-400 hover:text-amber-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('warehouses.destroy', $warehouse) }}" method="POST" onsubmit="return confirm('Hapus gudang ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-12 text-center text-slate-400">Belum ada data gudang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($warehouses->hasPages())
        <div class="px-8 py-4 bg-slate-50 border-t border-slate-100">
            {{ $warehouses->links() }}
        </div>
        @endif
    </div>
    </div>

</x-app-layout>
