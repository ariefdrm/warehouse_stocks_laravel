<header class="bg-white/80 backdrop-blur-md border-b border-slate-200 px-6 py-3 sticky top-0 z-40">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-900">@yield('page-title', 'Dashboard')</h1>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex flex-col text-right">
                <span class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</span>
                <span
                    class="text-[10px] text-blue-600 font-bold uppercase">{{ auth()->user()->role->name ?? 'User' }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="p-2 text-slate-400 hover:text-red-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>
