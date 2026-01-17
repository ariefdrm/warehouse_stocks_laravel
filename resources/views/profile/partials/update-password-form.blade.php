<section class="max-w-3xl">
    <header class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                    </path>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">
                {{ __('Keamanan Akun') }}
            </h2>
        </div>
        <p class="text-sm text-slate-500">
            {{ __('Pastikan akun Anda menggunakan password yang panjang dan acak untuk menjaga keamanan data gudang.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 max-w-xl">
            <div class="space-y-1">
                <x-input-label for="update_password_current_password" :value="__('Password Saat Ini')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    class="block w-full transition-all" autocomplete="current-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-xs" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1">
                    <x-input-label for="update_password_password" :value="__('Password Baru')" />
                    <x-text-input id="update_password_password" name="password" type="password"
                        class="block w-full transition-all" autocomplete="new-password"
                        placeholder="Minimal 8 karakter" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="text-xs" />
                </div>

                <div class="space-y-1">
                    <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Password')" />
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                        type="password" class="block w-full transition-all" autocomplete="new-password"
                        placeholder="Ulangi password baru" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-xs" />
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
            <x-primary-button class="px-8 shadow-lg shadow-blue-600/20">
                {{ __('Perbarui Password') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4" x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-sm font-bold text-green-600 bg-green-50 px-4 py-2 rounded-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ __('Password Berhasil Diganti') }}
                </div>
            @endif
        </div>
    </form>
</section>
