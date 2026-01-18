<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StokFlow') }} - Warehouse Management</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Custom scrollbar bergaya Slate modern */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>

</head>

<body class="antialiased bg-slate-50 text-slate-900" x-data="{ sidebarOpen: localStorage.getItem('sidebarStatus') !== 'false' }" x-init="$watch('sidebarOpen', value => localStorage.setItem('sidebarStatus', value))">

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="fixed bottom-8 right-8 z-[100] flex items-center gap-3 bg-slate-900 text-white px-6 py-4 rounded-2xl shadow-2xl border border-slate-800"
            x-cloak>
            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <p class="text-sm font-bold tracking-tight">{{ session('success') }}</p>
            <button @click="show = false" class="ml-4 text-slate-500 hover:text-white transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    @endif


    <div class="flex h-screen overflow-hidden bg-slate-50">

        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

            @isset($header)
                <header
                    class="bg-white/80 backdrop-blur-md border-b border-slate-200 px-6 py-3 sticky top-0 z-40 transition-all duration-300">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <button @click="sidebarOpen = !sidebarOpen"
                                class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-slate-100 transition-colors group">
                                <div class="w-6 h-6 text-slate-600 group-hover:text-blue-600 transition-all duration-500"
                                    :class="sidebarOpen ? 'rotate-0' : 'rotate-180'">
                                    <?xml version="1.0" encoding="UTF-8" standalone="no"?>
                                    <!DOCTYPE svg
                                        PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                    <svg width="100%" height="100%" viewBox="0 0 1600 1600" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xml:space="preserve" xmlns:serif="http://www.serif.com/"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                                        <path
                                            d="M477.608,1468.749c-191.399,-0.655 -346.358,-158.831 -346.358,-353.855l0,-633.435c-0,-92.881 36.24,-181.958 100.747,-247.635c64.507,-65.677 151.997,-102.574 243.224,-102.574l2.388,0l0,1337.499Zm100.308,-1337.499l517.037,0c206.442,0 373.796,170.389 373.796,380.576l0,564.191c-0,216.901 -172.7,392.734 -385.737,392.734l-505.096,0l0,-1337.5Zm243.643,725.976l132.166,130.296c5.184,10.48 13.771,18.956 24.298,23.955l3.795,3.742l1.544,-1.566c5.22,1.79 10.815,2.762 16.633,2.762c28.516,0 51.668,-23.334 51.668,-52.075c0,-14.288 -5.722,-27.24 -14.98,-36.653c-1.963,-5.331 -5.087,-10.22 -9.21,-14.284l-119.04,-117.356l123.524,-128.151c18.865,-8.428 32.133,-28.327 32.133,-51.509c0,-30.803 -23.426,-55.81 -52.28,-55.81c-13.546,0 -25.895,5.512 -35.186,14.547l-0.243,-0.234l-177.189,183.826l0.955,0.921c-8.212,10.739 -13.203,24.88 -13.203,40.367c0,26.343 14.441,48.795 34.613,57.226Z" />
                                    </svg>
                                </div>
                            </button>

                            <h1 class="text-xl font-bold text-slate-900 tracking-tight">
                                @yield('page-title', 'Dashboard')
                            </h1>
                        </div>

                        <div class="flex items-center gap-6">
                            @isset($actions)
                                <div class="flex items-center gap-3">
                                    {{ $actions }}
                                </div>
                            @endisset

                            <div class="flex flex-col text-right hidden md:flex border-l border-slate-200 pl-6">
                                <span class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</span>
                                <span class="text-[10px] text-blue-600 font-bold uppercase tracking-widest">
                                    {{ auth()->user()->role->name ?? 'User' }}
                                </span>
                            </div>

                            @if (request()->routeIs('dashboard'))
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        class="p-2.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all shadow-sm border border-transparent hover:border-red-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </header>
            @endisset

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8 custom-scrollbar">
                <div class="max-w-full mx-auto">
                    @if ($errors->any())
                        <div
                            class="mb-6 p-4 bg-red-50 border border-red-100 rounded-2xl flex items-center gap-3 text-red-600">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-sm font-bold">Mohon periksa kembali inputan Anda.</p>
                        </div>
                    @endif

                    @if (isset($slot))
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endif

                    <footer class="py-12 mt-12 border-t border-slate-200">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                            <p class="text-[11px] text-slate-400 font-medium uppercase tracking-widest">
                                &copy; {{ date('Y') }} StokFlow System v1.0.4
                            </p>
                            <div class="flex gap-6">
                                <span class="text-[10px] font-bold text-slate-300 uppercase">Privacy Policy</span>
                                <span class="text-[10px] font-bold text-slate-300 uppercase">Terms of Service</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
