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

        /* Custom scrollbar untuk kenyamanan visual */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="antialiased bg-slate-50 text-slate-900" x-data="{ sidebarOpen: localStorage.getItem('sidebarStatus') !== 'false' }" x-init="$watch('sidebarOpen', value => localStorage.setItem('sidebarStatus', value))">

    <div class="flex h-screen overflow-hidden bg-slate-50">

        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

            @isset($header)
                <header class="bg-white border-b border-slate-200 px-8 py-5 z-30 shrink-0">
                    <div class="flex items-center justify-between">
                        <h2 class="font-bold text-2xl text-slate-800 tracking-tight leading-tight">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8 custom-scrollbar">
                <div class="max-w-full mx-auto">
                    @if (isset($slot))
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endif

                    <footer class="py-8 mt-12 border-t border-slate-200">
                        <p class="text-[11px] text-slate-400 font-medium text-center uppercase tracking-widest">
                            &copy; {{ date('Y') }} StokFlow System v1.0.4
                        </p>
                    </footer>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
