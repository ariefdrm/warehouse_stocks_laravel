<aside
    class="bg-slate-900 text-slate-400 transition-all duration-300 flex flex-col sticky top-0 h-screen z-50 shadow-xl border-r border-slate-800"
    :class="sidebarOpen ? 'w-64' : 'w-20'" x-cloak>

    <div class="h-20 flex items-center justify-between px-2  border-b border-slate-800 shrink-0 overflow-hidden">
        <div class="flex items-center">
            <div
                class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center shrink-0 shadow-lg shadow-blue-500/20 text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <span class="ml-3 font-bold text-white text-base tracking-tight whitespace-nowrap" x-show="sidebarOpen">
                StokFlow
            </span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen"
            class="p-1.5 rounded-lg hover:bg-slate-800 text-slate-500 hover:text-white transition-colors">
            <svg class="w-5 h-5 transition-transform duration-500" :class="sidebarOpen ? 'rotate-180' : ''"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7">
                </path>
            </svg>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-3 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-white' }} group">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">Dashboard</span>
        </a>

        <a href="#"
            class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">Manajemen Stok</span>
        </a>
    </nav>

    <div class="p-4 border-t border-slate-800 relative" x-data="{ userMenuOpen: false }">
        <button @click="userMenuOpen = !userMenuOpen"
            class="w-full flex items-center p-2 rounded-xl hover:bg-slate-800 transition-all duration-200 group">
            <div
                class="w-9 h-9 rounded-lg bg-slate-700 flex-shrink-0 flex items-center justify-center text-xs font-bold text-slate-300 border border-slate-600 uppercase group-hover:border-blue-500 transition-colors">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div class="ml-3 text-left transition-all duration-300 overflow-hidden whitespace-nowrap"
                x-show="sidebarOpen">
                <p class="text-sm font-bold text-slate-200 leading-none">{{ explode(' ', auth()->user()->name)[0] }}</p>
                <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-wider font-semibold">
                    {{ auth()->user()->role->name ?? 'User' }}</p>
            </div>
            <svg x-show="sidebarOpen" class="ml-auto w-4 h-4 text-slate-500" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>

        <div x-show="userMenuOpen" @click.away="userMenuOpen = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            class="absolute bottom-full left-4 right-4 mb-2 bg-slate-800 border border-slate-700 rounded-xl shadow-2xl overflow-hidden z-50">

            <a href="{{ route('profile.edit') }}"
                class="flex items-center px-4 py-3 text-sm text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Edit Profil
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-4 py-3 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-500 transition-colors border-t border-slate-700">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
