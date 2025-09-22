<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Workers') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen flex" x-data="{ open: true }">

    <!-- Sidebar -->
    <aside 
        class="fixed top-0 left-0 h-screen bg-white shadow transition-all duration-300 z-20"
        :class="open ? 'w-64' : 'w-20'">
        <div class="flex items-center justify-between p-4 border-b">
            <span class="font-bold text-lg" x-show="open" x-transition>Dashboard</span>
            <button @click="open = !open" class="p-2 rounded hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="mt-4 space-y-2">
            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 0h8" />
                </svg>
                <span x-show="open" x-transition>Home</span>
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7" />
                </svg>
                <span x-show="open" x-transition>Tasks</span>
            </a>
        </nav>
    </aside>

    <!-- Main content -->
    <div 
        class="flex-1 transition-all duration-300"
        :class="open ? 'ml-64' : 'ml-20'"
    >
        <!-- Navigation / Top bar -->
        <livewire:layout.navigation />

        <!-- Page Header -->
        @if (isset($header))
            <header class="bg-white shadow sticky top-0 z-10">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="p-6 overflow-y-auto max-h-screen">
            {{ $slot }}
        </main>
    </div>
</div>

<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
