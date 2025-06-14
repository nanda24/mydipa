<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <title>{{ config('app.name', 'DIPA CRM') }}</title> -->
    <title>MyDIPA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons (if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind + JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800" x-data="{ sidebarOpen: false }">

    <!-- Mobile Overlay -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden" @click="sidebarOpen = false"></div>

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <div class="fixed z-50 inset-y-0 left-0 w-[300px] transform bg-white transition-transform duration-200 ease-in-out lg:static lg:translate-x-0"
             :class="{ '-translate-x-full': !sidebarOpen }">
            @include('layouts.sidebar')
        </div>

        {{-- Main Content --}}
        <div class="flex flex-col flex-1 w-full">
            @include('layouts.navigation')

            {{-- Page Header --}}
            <!-- @hasSection('header')
                <header class="bg-white shadow border-b">
                    <div class="max-w-7xl mx-auto py-4 px-6">
                        @yield('header')
                    </div>
                </header>
            @endif -->

            {{-- Page Content --}}
            <main class="flex-1 px-6 py-4">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
