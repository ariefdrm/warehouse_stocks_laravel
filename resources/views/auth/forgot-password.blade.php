<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50">
        <div class="mb-8 flex flex-col items-center">
            <a href="/" class="flex items-center gap-2 mb-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-slate-900">StokFlow</span>
            </a>
        </div>

        <div
            class="w-full sm:max-w-md px-8 py-10 bg-white shadow-xl shadow-slate-200/60 rounded-2xl border border-slate-100">
            <h2 class="text-2xl font-bold text-slate-900 mb-2">Lupa Password?</h2>

            <div class="mb-6 text-sm text-slate-600 leading-relaxed">
                {{ __('Jangan khawatir. Masukkan alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang password yang memungkinkan Anda memilih password baru.') }}
            </div>

            <x-auth-session-status
                class="mb-6 p-4 bg-blue-50 border border-blue-100 rounded-xl font-medium text-sm text-blue-700"
                :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email Pemulihan')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" placeholder="nama@perusahaan.com" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
                </div>

                <div class="mt-8 flex flex-col gap-4">
                    <x-primary-button class="w-full">
                        {{ __('Kirim Tautan Pemulihan') }}
                    </x-primary-button>

                    <a href="{{ route('login') }}"
                        class="text-center text-sm font-semibold text-slate-500 hover:text-blue-600 transition duration-200">
                        Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
