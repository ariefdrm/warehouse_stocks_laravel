<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50">
        <div class="mb-8 flex flex-col items-center">
            <a href="/" class="flex items-center gap-2 mb-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-slate-900">StokFlow</span>
            </a>
            <h2 class="text-slate-600 font-medium">Masuk ke Manajemen Gudang Anda</h2>
        </div>

        <div
            class="w-full sm:max-w-md px-8 py-10 bg-white shadow-xl shadow-slate-200/60 rounded-2xl border border-slate-100">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-1 leading-relaxed">Email
                        Perusahaan</label>
                    <x-text-input id="email"
                        class="block w-full px-4 py-3 bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-xl transition duration-200"
                        type="email" name="email" :value="old('email')" placeholder="nama@perusahaan.com" required
                        autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
                </div>

                <div class="mt-5">
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs font-medium text-blue-600 hover:text-blue-700 transition"
                                href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                    <x-text-input id="password"
                        class="block w-full px-4 py-3 bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-xl transition duration-200"
                        type="password" name="password" placeholder="••••••••" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox"
                            class="w-4 h-4 rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500 transition cursor-pointer"
                            name="remember">
                        <span class="ms-2 text-sm text-slate-600">Ingat perangkat ini</span>
                    </label>
                </div>

                <div class="mt-8">
                    <button type="submit"
                        class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        {{ __('Masuk Sekarang') }}
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-sm text-slate-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-700">Daftar
                        gratis</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
