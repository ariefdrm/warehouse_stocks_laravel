<section class="max-w-3xl">
    <header class="mb-6">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">
                {{ __('Hapus Akun') }}
            </h2>
        </div>

        <p class="text-sm text-slate-500 leading-relaxed">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun, mohon unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Hapus Akun Secara Permanen') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white rounded-3xl">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold text-slate-900 tracking-tight">
                {{ __('Apakah Anda yakin ingin menghapus akun?') }}
            </h2>

            <div class="mt-4 p-4 bg-red-50 border border-red-100 rounded-2xl">
                <p class="text-sm text-red-700 leading-relaxed font-medium">
                    {{ __('Tindakan ini tidak dapat dibatalkan. Semua data inventaris dan log transaksi Anda akan hilang. Silakan masukkan password Anda untuk mengonfirmasi penghapusan permanen.') }}
                </p>
            </div>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password Konfirmasi') }}" />

                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-full transition-all focus:ring-red-200 focus:border-red-500"
                    placeholder="{{ __('Masukkan Password Anda') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-xs" />
            </div>

            <div class="mt-8 flex flex-col-reverse sm:flex-row justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')"
                    class="px-8 border-slate-200 text-slate-600 hover:bg-slate-50 rounded-xl">
                    {{ __('Batalkan') }}
                </x-secondary-button>

                <x-danger-button class="px-8">
                    {{ __('Ya, Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
