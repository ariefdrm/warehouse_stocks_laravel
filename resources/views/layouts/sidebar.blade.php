<aside
    class="bg-slate-900 text-slate-400 transition-all duration-300 flex flex-col sticky top-0 h-screen z-50 shadow-xl border-r border-slate-800"
    :class="sidebarOpen ? 'w-64' : 'w-20'" x-cloak>

    <div class="h-20 flex items-center justify-between px-5  border-b border-slate-800 shrink-0 overflow-hidden">
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

        @if (auth()->user()->hasAnyRole(['owner', 'admin']))
            <a href="/categories"
                class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                </svg>
                <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">Categories</span>
            </a>
        @endif

        @if (auth()->user()->hasAnyRole(['owner', 'admin']))
            <a href="/warehouses"
                class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>
                <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">Warehouses</span>
            </a>
        @endif

        @if (auth()->user()->hasAnyRole(['owner', 'admin', 'staff', 'supervisor']))
            <a href="/items"
                class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">items</span>
            </a>
        @endif

        @if (auth()->user()->hasAnyRole(['owner', 'admin', 'supervisor', 'staff']))
            <a href="/stocks"
                class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg>
                <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">stocks</span>

            </a>
        @endif


        @if (auth()->user()->hasAnyRole(['owner', 'admin', 'supervisor', 'staff']))
            <a href="/stock-transactions"
                class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                </svg>
                <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">stock-transactions</span>
            </a>

        @endif


        @if (auth()->user()->hasrole('owner'))
            <a href="/users"
                class="flex items-center px-3 py-2.5 rounded-xl hover:bg-slate-800 hover:text-white transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
                <span class="ml-3 font-medium text-sm whitespace-nowrap" x-show="sidebarOpen">Users</span>
            </a>
        @endif

    </nav>

    <div class="p-2 pb-20border-t border-slate-800 relative" x-data="{ userMenuOpen: false }">

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
                    {{ auth()->user()->role->role_name ?? 'User' }}</p>
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
