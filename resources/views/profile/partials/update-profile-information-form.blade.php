<section class="max-w-3xl">
    <header class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 tracking-tight">
            {{ __('Informasi Profil') }}
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            {{ __('Perbarui informasi profil akun dan alamat email Anda untuk koordinasi gudang yang lebih akurat.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" type="text"
                    class="block w-full transition-all focus:ring-2" :value="old('name', $user->name)" required autofocus
                    autocomplete="name" placeholder="Masukkan nama Anda" />
                <x-input-error class="text-xs" :messages="$errors->get('name')" />
            </div>

            <div class="space-y-1">
                <x-input-label for="email" :value="__('Alamat Email')" />
                <x-text-input id="email" name="email" type="email"
                    class="block w-full transition-all focus:ring-2" :value="old('email', $user->email)" required autocomplete="username"
                    placeholder="email@perusahaan.com" />
                <x-input-error class="text-xs" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="mt-3 p-3 bg-amber-50 border border-amber-100 rounded-xl">
                        <p class="text-xs text-amber-700 leading-relaxed font-medium">
                            {{ __('Email Anda belum diverifikasi.') }}
                            <button form="send-verification"
                                class="text-blue-600 hover:text-blue-800 underline font-bold ml-1 focus:outline-none">
                                {{ __('Klik di sini untuk kirim ulang email verifikasi.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-bold text-xs text-green-600">
                                {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
            <x-primary-button class="px-8 shadow-lg shadow-blue-600/20">
                {{ __('Simpan Perubahan') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-end="opacity-0 -translate-x-4" x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-sm font-bold text-green-600 bg-green-50 px-4 py-2 rounded-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ __('Berhasil Disimpan') }}
                </div>
            @endif
        </div>
    </form>
</section>
