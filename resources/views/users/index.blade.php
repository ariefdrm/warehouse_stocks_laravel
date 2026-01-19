<x-app-layout>
    <x-slot name="header">{{ __('Manajemen Pengguna') }}</x-slot>

    <div class="space-y-6">
        <div class="bg-indigo-50 border border-indigo-100 p-4 rounded-2xl flex items-center gap-4">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-600 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-slate-800">Kontrol Akses</h3>
                <p class="text-xs text-slate-500">Kelola peran pengguna untuk membatasi hak akses di dalam sistem StokFlow.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 text-[11px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100">
                            <th class="px-8 py-4">Pengguna</th>
                            <th class="px-8 py-4">Email</th>
                            <th class="px-8 py-4">Peran</th>
                            <th class="px-8 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($users as $user)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-8 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-500 border border-slate-200 uppercase">
                                        {{ substr($user->name, 0, 2) }}
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-700 leading-tight">{{ $user->name }}</span>
                                        <span class="text-[10px] text-slate-400 font-medium italic">Bergabung {{ $user->created_at->format('M Y') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-4 text-sm text-slate-500">
                                {{ $user->email }}
                            </td>
                            <td class="px-8 py-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider border {{ $user->role->role_name === 'owner' ? 'bg-purple-50 text-purple-600 border-purple-100' : 'bg-blue-50 text-blue-600 border-blue-100' }}">
                                    {{ $user->role->role_name ?? 'No Role' }}
                                </span>
                            </td>
                            <td class="px-8 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    {{-- Edit Role --}}
                                    @if(auth()->id() !== $user->id)
                                    <a href="{{ route('users.edit', $user) }}" class="p-2 text-slate-400 hover:text-indigo-600 transition-colors" title="Ubah Peran">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </a>

                                    {{-- Delete User --}}
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="p-2 text-slate-400 hover:text-red-600 transition-colors {{ $user->role->role_name === 'owner' ? 'opacity-20 cursor-not-allowed' : '' }}"
                                                {{ $user->role->role_name === 'owner' ? 'disabled' : '' }}
                                                onclick="return confirm('Hapus pengguna ini? Tindakan ini tidak dapat dibatalkan.')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                    @else
                                    <span class="text-[10px] font-bold text-slate-300 uppercase italic">Anda</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-8 py-4 bg-slate-50/50 border-t border-slate-100">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
