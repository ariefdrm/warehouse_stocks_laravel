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
                <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 px-8 py-5 z-30 shrink-0">
                    <div class="max-w-full mx-auto flex items-center justify-between">
                        <div>
                            <h2 class="font-bold text-2xl text-slate-800 tracking-tight leading-tight">
                                {{ $header }}
                            </h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">
                                StokFlow &bull; Enterprise Resource Planning
                            </p>
                        </div>

                        @isset($actions)
                            <div class="flex items-center gap-3">
                                {{ $actions }}
                            </div>
                        @endisset
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
