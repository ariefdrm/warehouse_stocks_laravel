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

        <a href="/categories"
            class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">Categories</span>
        </a>


        <a href="/warehouses"
            class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
            <svg class="w-5 h-5 shrink-0" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 14.0014H17M7 14.0014V11.6014C7 11.0413 7 10.7613 7.10899 10.5474C7.20487 10.3592 7.35785 10.2062 7.54601 10.1104C7.75992 10.0014 8.03995 10.0014 8.6 10.0014H15.4C15.9601 10.0014 16.2401 10.0014 16.454 10.1104C16.6422 10.2062 16.7951 10.3592 16.891 10.5474C17 10.7613 17 11.0413 17 11.6014V14.0014M7 14.0014V18.0014V21.0014M17 14.0014V18.0014V21.0014M18.3466 6.17468L14.1466 4.07468C13.3595 3.68113 12.966 3.48436 12.5532 3.40691C12.1876 3.33832 11.8124 3.33832 11.4468 3.40691C11.034 3.48436 10.6405 3.68113 9.85338 4.07468L5.65337 6.17468C4.69019 6.65627 4.2086 6.89707 3.85675 7.25631C3.5456 7.574 3.30896 7.95688 3.16396 8.37725C3 8.85262 3 9.39106 3 10.4679V19.4014C3 19.9614 3 20.2414 3.10899 20.4554C3.20487 20.6435 3.35785 20.7965 3.54601 20.8924C3.75992 21.0014 4.03995 21.0014 4.6 21.0014H19.4C19.9601 21.0014 20.2401 21.0014 20.454 20.8924C20.6422 20.7965 20.7951 20.6435 20.891 20.4554C21 20.2414 21 19.9614 21 19.4014V10.4679C21 9.39106 21 8.85262 20.836 8.37725C20.691 7.95688 20.4544 7.574 20.1433 7.25631C19.7914 6.89707 19.3098 6.65627 18.3466 6.17468Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">Warehouses</span>
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

    <div class="p-4 pb-20border-t border-slate-800 relative" x-data="{ userMenuOpen: false }">

        <button @click="userMenuOpen = !userMenuOpen"
            class="w-full flex items-center p-2 rounded-xl hover:bg-slate-800 transition-all duration-200 group">

            <div
                class="w-9 h-9 rounded-lg bg-slate-700 flex-shrink-0 flex items-center justify-center text-xs font-bold text-slate-300 border border-slate-600 uppercase group-hover:border-blue-500 transition-colors">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>

            <div class="ml-3 text-left transition-all duration-300 overflow-hidden whitespace-nowrap"
                x-show="sidebarOpen" x-transition:enter="delay-100">
                <p class="text-sm font-bold text-slate-200 leading-none">{{ explode(' ', auth()->user()->name)[0] }}</p>
                <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-wider font-semibold">
                    {{ auth()->user()->role->name ?? 'User' }}</p>
            </div>

            <svg x-show="sidebarOpen" class="ml-auto w-4 h-4 text-slate-500 transition-transform"
                :class="userMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>

        <div x-show="userMenuOpen" @click.away="userMenuOpen = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-4 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-cloak /* LOGIKA POSISI: Selalu
            gunakan 'bottom-full' agar muncul ke atas tombol profil */
            :class="sidebarOpen
                ?
                'absolute bottom-full left-0 w-full mb-2' :
                'absolute bottom-0 left-full ml-4 w-52'"
            class="bg-slate-800 border border-slate-700 rounded-2xl shadow-2xl overflow-hidden z-[100]">

            <div class="px-4 py-3 border-b border-slate-700 bg-slate-900/50">
                <p class="text-xs font-bold text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-[10px] text-slate-500 truncate">{{ auth()->user()->email }}</p>
            </div>

            <div class="p-1">
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center px-3 py-2 text-sm text-slate-300 hover:bg-slate-700 hover:text-white rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Edit Profil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center px-3 py-2 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-500 rounded-lg transition-colors mt-1">
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
    </div>
</aside>
