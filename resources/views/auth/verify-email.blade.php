<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50">
        <div class="mb-8 flex flex-col items-center">
            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
        </div>

        <div
            class="w-full sm:max-w-md px-8 py-10 bg-white shadow-xl shadow-slate-200/60 rounded-2xl border border-slate-100 text-center">
            <h2 class="text-2xl font-bold text-slate-900 mb-2">Verifikasi Email Anda</h2>

            <div class="mb-6 text-sm text-slate-600 leading-relaxed">
                {{ __('Terima kasih telah bergabung! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan. Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan ulang.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-4 bg-green-50 border border-green-100 rounded-xl font-medium text-sm text-green-600">
                    {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
                </div>
            @endif

            <div class="mt-8 flex flex-col gap-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm font-semibold text-slate-500 hover:text-slate-800 transition duration-200 underline decoration-slate-300 underline-offset-4">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>

        <p class="mt-8 text-sm text-slate-500">
            Butuh bantuan? <a href="#" class="text-blue-600 font-medium">Hubungi Support</a>
        </p>
    </div>
</x-guest-layout>
