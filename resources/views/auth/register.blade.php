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
            <h2 class="text-slate-600 font-medium">Buat akun manajemen gudang Anda</h2>
        </div>

        <div
            class="w-full sm:max-w-lg px-8 bg-white shadow-xl py-10 shadow-slate-200/60 rounded-2xl border border-slate-100">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid grid-cols-1 gap-5">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-1">Nama
                            Lengkap</label>
                        <x-text-input id="name"
                            class="block w-full px-4 py-3 bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-xl transition duration-200"
                            type="text" name="name" :value="old('name')" placeholder="Contoh: Budi Santoso" required
                            autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs" />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email
                            Perusahaan</label>
                        <x-text-input id="email"
                            class="block w-full px-4 py-3 bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-xl transition duration-200"
                            type="email" name="email" :value="old('email')" placeholder="nama@perusahaan.com" required
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="password"
                                class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                            <x-text-input id="password"
                                class="block w-full px-4 py-3 bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-xl transition duration-200"
                                type="password" name="password" placeholder="••••••••" required
                                autocomplete="new-password" />
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-semibold text-slate-700 mb-1">Konfirmasi</label>
                            <x-text-input id="password_confirmation"
                                class="block w-full px-4 py-3 bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-xl transition duration-200"
                                type="password" name="password_confirmation" placeholder="••••••••" required
                                autocomplete="new-password" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="text-xs" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-xs" />
                </div>

                <div class="mt-8">
                    <button type="submit"
                        class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        {{ __('Daftar Sekarang') }}
                    </button>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-[13px] text-slate-500">
                        Dengan mendaftar, Anda menyetujui <a href="#"
                            class="text-blue-600 hover:underline">Ketentuan Layanan</a> dan <a href="#"
                            class="text-blue-600 hover:underline">Kebijakan Privasi</a> kami.
                    </p>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-sm text-slate-500">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-700">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
