
<x-app-layout>
    <x-slot name="header">{{ __('Tambah Pengguna Baru') }}</x-slot>

    <x-slot name="actions">
        <a href="{{ route('users.index') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <form action="{{ route('users.store') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            @csrf

            <div class="p-8 space-y-8">
                <div class="flex items-center gap-4 pb-6 border-b border-slate-100">
                    <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">Identitas Pengguna</h3>
                        <p class="text-xs text-slate-500">Daftarkan akun baru untuk staf atau admin gudang Anda.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name')" required autofocus placeholder="Masukkan nama lengkap" />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="email" :value="__('Alamat Email')" />
                        <x-text-input id="email" name="email" type="email" class="block w-full" :value="old('email')" required placeholder="email@stokflow.com" />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" name="password" type="password" class="block w-full" required placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block w-full" required placeholder="••••••••" />
                    </div>

                    <div class="md:col-span-2 space-y-2">
                        <x-input-label for="roles_id" :value="__('Tentukan Peran (Role)')" />
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach($roles as $role)
                            <label class="relative flex cursor-pointer rounded-2xl border bg-white p-4 shadow-sm focus:outline-none hover:border-blue-200 transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50/50 group">
                                <input type="radio" name="roles_id" value="{{ $role->id }}" class="sr-only" required {{ old('roles_id') == $role->id ? 'checked' : '' }}>
                                <span class="flex flex-1">
                                    <span class="flex flex-col">
                                        <span class="block text-sm font-black text-slate-800 uppercase tracking-wider group-has-[:checked]:text-blue-700">{{ $role->role_name }}</span>
                                        <span class="mt-1 flex items-center text-xs text-slate-500 italic">
                                            Akses standar untuk {{ $role->role_name }}
                                        </span>
                                    </span>
                                </span>
                                <svg class="h-5 w-5 text-blue-600 hidden group-has-[:checked]:block" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>
                            @endforeach
                        </div>
                        <x-input-error :messages="$errors->get('roles_id')" />
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-100">
                    <a href="{{ route('users.index') }}" class="text-xs font-bold text-slate-400 hover:text-slate-600 uppercase tracking-widest transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-10 py-3 bg-blue-600 hover:bg-blue-700 text-white font-black uppercase text-[11px] tracking-widest rounded-xl transition-all shadow-lg shadow-blue-200">
                        Buat Akun Sekarang
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
