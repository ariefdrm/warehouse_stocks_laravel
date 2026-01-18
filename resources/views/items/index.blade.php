@section('page-title', "Manajemen Barang")

<x-app-layout>
    <x-slot name="header">{{ __('Items') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('items.create') }}" class="flex items-center gap-2 px-4 py-2.5 bg-slate-900 text-black dark:text-white text-sm font-bold rounded-xl hover:bg-slate-800 transition shadow-lg shadow-slate-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Item
        </a>
    </x-slot>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Unit & SKU</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Kategori</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Deskripsi</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($items as $item)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-900 group-hover:text-brand-primary transition-colors">{{ $item->unit }}</span>
                                    <span class="text-xs font-mono text-slate-400 mt-1 tracking-wider uppercase">{{ $item->sku }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-brand-primary border border-blue-100 uppercase tracking-tighter">
                                    {{ $item->category->name }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-sm text-slate-500 max-w-xs truncate italic">
                                {{ $item->description ?? '-' }}
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end items-center gap-3">
                                    <a href="{{ route('items.edit', $item) }}" class="p-2 text-slate-400 hover:text-brand-primary hover:bg-blue-50 rounded-xl transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus barang ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-brand-danger hover:bg-red-50 rounded-xl transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-12 text-center text-slate-400 italic">Belum ada data barang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-8 py-5 border-t border-slate-100 bg-slate-50/30">
            {{ $items->links() }}
        </div>
    </div>
</x-app-layout>
