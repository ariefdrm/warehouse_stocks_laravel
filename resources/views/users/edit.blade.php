<x-app-layout>
    <x-slot name="header">{{ __('Ubah Peran Pengguna') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('users.index') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <form action="{{ route('users.update', $user) }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            @csrf
            @method('PUT')

            <div class="p-8 space-y-6">
                <div class="flex items-center gap-4 pb-6 border-b border-slate-100">
                    <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center text-xl font-black text-white shadow-lg shadow-indigo-200">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">{{ $user->name }}</h3>
                        <p class="text-sm text-slate-500">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <x-input-label for="role_id" :value="__('Pilih Peran Baru')" />
                    <select name="roles_id" id="roles_id" class="block w-full border-slate-200 focus:border-indigo-600 focus:ring-indigo-600 rounded-xl shadow-sm transition-all" required>
                        {{-- Asumsi Anda memiliki data $roles dari provider atau dikirim dari controller --}}
                        {{-- Jika belum ada, Anda perlu menambahkan $roles = Role::all() di UserController@edit --}}
                        @foreach(App\Models\Roles::all() as $role)
                            <option value="{{ $role->id }}" {{ $user->roles_id == $role->id ? 'selected' : '' }}>
                                {{ strtoupper($role->role_name) }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                    <p class="text-[10px] text-slate-400 italic">Perubahan peran akan langsung memengaruhi hak akses pengguna setelah mereka memuat ulang halaman.</p>
                </div>

                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-black uppercase text-[11px] tracking-widest rounded-xl transition-all shadow-lg shadow-indigo-100">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('users.index') }}" class="text-xs font-bold text-slate-400 hover:text-slate-600 uppercase tracking-widest">Batal</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
