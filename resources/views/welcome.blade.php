<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StokFlow - Warehouse Management System</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight">StokFlow</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features"
                        class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Fitur</a>
                    <a href="#about"
                        class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Tentang</a>
                    @if (Route::has('login'))
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="text-sm font-semibold bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-sm font-medium text-slate-600 hover:text-blue-600">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="text-sm font-semibold bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition">Daftar
                                        Sekarang</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <header class="relative pt-16 pb-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                    {{-- <span
                        class="inline-block px-3 py-1 text-xs font-semibold tracking-wider text-blue-700 uppercase bg-blue-100 rounded-full mb-4">
                        v2.0 Telah Rilis
                    </span> --}}
                    <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-6xl">
                        Kelola Stok Gudang <span class="text-blue-600">Tanpa Pusing</span>
                    </h1>
                    <p class="mt-6 text-lg text-slate-600">
                        Solusi inventaris cerdas untuk Anda yang lebih percaya pada akurasi data dan keandalan, daripada
                        janji manis 19 juta tenaga kerja yang entah kapan terealisasi (dan entah di mana barangnya)
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row gap-4 sm:justify-center lg:justify-start">
                        <a href="{{ route('register') }}"
                            class="px-8 py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all text-center">
                            Mulai Gratis
                        </a>
                        {{-- <a href="#demo"
                            class="px-8 py-4 bg-white text-slate-700 border border-slate-200 font-bold rounded-xl hover:bg-slate-50 transition text-center">
                            Lihat Demo
                        </a> --}}
                    </div>
                </div>
                <div class="w-full lg:max-w-none lg:mx-0 lg:col-span-6 flex justify-center">
                    <img src="{{ asset('images/warehouse_worker.png') }}" alt="Warehouse Image"
                        class="rounded-xl shadow-xl mt-10 lg:mt-0 lg:col-span-6 object-cover">
                </div>
                {{-- <div
                    class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                    <div
                        class="relative mx-auto w-full rounded-2xl shadow-2xl overflow-hidden bg-slate-800 border-8 border-slate-900">
                        <div class="bg-slate-700 h-6 w-full flex items-center px-4 gap-1">
                            <div class="w-2 h-2 rounded-full bg-red-400"></div>
                            <div class="w-2 h-2 rounded-full bg-yellow-400"></div>
                            <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        </div>
                        <div class="p-4">
                            <div class="grid grid-cols-3 gap-4 mb-4">
                                <div class="h-20 bg-slate-600 rounded-lg animate-pulse"></div>
                                <div class="h-20 bg-slate-600 rounded-lg animate-pulse"></div>
                                <div class="h-20 bg-slate-600 rounded-lg animate-pulse"></div>
                            </div>
                            <div class="h-40 bg-slate-600 rounded-lg animate-pulse"></div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </header>

    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900">Fitur Unggulan StokFlow</h2>
                <p class="mt-4 text-slate-600">Segala yang Anda butuhkan untuk mengontrol gudang dari mana saja.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 border border-slate-100 rounded-2xl hover:shadow-xl transition shadow-sm">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Inventory Tracking</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Pantau pergerakan stok barang masuk dan keluar
                        secara real-time dengan akurasi tinggi.</p>
                </div>

                <div class="p-8 border border-slate-100 rounded-2xl hover:shadow-xl transition shadow-sm">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Low Stock Alerts</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Dapatkan notifikasi otomatis saat stok barang
                        mencapai batas minimum untuk menghindari kekosongan.</p>
                </div>

                <div class="p-8 border border-slate-100 rounded-2xl hover:shadow-xl transition shadow-sm">
                    <div
                        class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Analytic Reports</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Laporan bulanan yang komprehensif untuk membantu
                        Anda mengambil keputusan bisnis berbasis data.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-4">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2026 StokFlow Inc. Built with Laravel & Tailwind CSS.</p>
        </div>
    </footer>

</body>

</html>
